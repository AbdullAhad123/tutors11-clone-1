<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class ChatGPTService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'timeout' => 45,
            'verify' => true,
        ]);
        
        $this->apiKey = config('services.openai.key') ?? env('OPENAI_API_KEY');
        
        Log::info('ChatGPT Service initialized', [
            'api_key_configured' => !empty($this->apiKey),
            'api_key_length' => $this->apiKey ? strlen($this->apiKey) : 0,
        ]);
    }

    /**
     * Legacy method for backward compatibility
     */
    public function checkAnswer($question, $answer)
    {
        return $this->validateQuestionAndAnswer($question, $answer, []);
    }

    /**
     * Comprehensive validation of question and answer with all options
     */
    public function validateQuestionAndAnswer($question, $answer, $allOptions = [], $additionalData = [])
    {
        if (!$this->apiKey || empty(trim($this->apiKey))) {
            Log::error('API key validation failed');
            return [
                'success' => false,
                'error' => 'OpenAI API key not configured. Please add OPENAI_API_KEY to your .env file'
            ];
        }

        try {
            // Sanitize inputs
            $question = trim(strip_tags($question));
            $answer = trim(strip_tags($answer));
            
            if (empty($question) || empty($answer)) {
                return [
                    'success' => false,
                    'error' => 'Question and answer cannot be empty'
                ];
            }
            
            // Build appropriate prompt based on available data
            $prompt = empty($additionalData) 
                ? $this->buildBasicPrompt($question, $answer, $allOptions)
                : $this->buildComprehensivePrompt($question, $answer, $allOptions, $additionalData);
            
            Log::info('Making OpenAI API request', [
                'question_length' => strlen($question),
                'answer_length' => strlen($answer),
                'options_count' => count($allOptions),
                'comprehensive_mode' => !empty($additionalData)
            ]);
            
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4o',
                    'messages' => [
                        [
                            'role' => 'system', 
                            'content' => empty($additionalData) 
                                ? 'You are an expert educational content validator. Analyze questions and answers for accuracy.'
                                : 'You are an expert educational content validator, curriculum specialist, learning analytics expert, and question type classification specialist. You have deep knowledge of educational standards, age-appropriate content, subject classifications, pedagogical best practices, learning taxonomies, and various question types (multiple choice, fill-in-the-blank, true/false, short answer, essay, matching, etc.). Analyze all aspects of educational questions comprehensively and provide actionable improvements.'
                        ],
                        [
                            'role' => 'user', 
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.1,
                    'max_tokens' => empty($additionalData) ? 500 : 2000,
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
            
            if (!isset($responseData['choices'][0]['message']['content'])) {
                throw new \Exception('Invalid API response structure');
            }
            
            $content = $responseData['choices'][0]['message']['content'];
            
            return [
                'success' => true,
                'result' => $content,
                'usage' => $responseData['usage'] ?? null,
                'model' => $responseData['model'] ?? 'gpt-4o'
            ];
            
        } catch (RequestException $e) {
            Log::error('ChatGPT API request failed', [
                'error' => $e->getMessage(),
                'response_body' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ]);
            
            return [
                'success' => false,
                'error' => 'API request failed: ' . $e->getMessage()
            ];
            
        } catch (\Exception $e) {
            Log::error('ChatGPT service error', [
                'error' => $e->getMessage(),
            ]);
            
            return [
                'success' => false,
                'error' => 'Service error: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Basic prompt for simple answer validation
     */
    protected function buildBasicPrompt($question, $answer, $allOptions = [])
    {
        $optionsText = '';
        if (!empty($allOptions)) {
            $optionsText = "\n\nAVAILABLE OPTIONS:\n";
            foreach ($allOptions as $i => $option) {
                $optionsText .= ($i + 1) . ". " . strip_tags($option) . "\n";
            }
        }

        return "Please analyze this educational question and answer for accuracy.\n\n" .
               "QUESTION:\n{$question}\n\n" .
               "PROVIDED ANSWER:\n{$answer}" . $optionsText . "\n\n" .
               "INSTRUCTIONS:\n" .
               "1. Determine if the answer is correct, partially correct, or incorrect\n" .
               "2. If incorrect or incomplete, provide the correct answer\n" .
               "3. Be specific about what's wrong if the answer is incorrect\n" .
               "4. Format your response as JSON with these fields:\n" .
               "   - status: 'correct', 'partially_correct', or 'incorrect'\n" .
               "   - explanation: Brief explanation of your assessment\n" .
               "   - correct_answer: The correct answer (if different from provided)\n" .
               "   - confidence: Your confidence level (1-10)\n\n" .
               "Respond only with valid JSON.";
    }

    /**
     * Enhanced comprehensive prompt for full educational content analysis with question type validation
     */
    protected function buildComprehensivePrompt($question, $answer, $allOptions = [], $additionalData = [])
    {
        $topic = $additionalData['topic'] ?? '';
        $subtopic = $additionalData['subtopic'] ?? '';
        $explanation = $additionalData['explanation'] ?? '';
        $hint = $additionalData['hint'] ?? '';
        $tags = implode(', ', $additionalData['tags'] ?? []);
        $difficultyLevel = $additionalData['difficulty_level'] ?? '';
        $currentGradeLevel = $additionalData['grade_level'] ?? '';
        $subjectArea = $additionalData['subject_area'] ?? '';
        $currentQuestionType = $additionalData['current_question_type'] ?? 'Unknown';
        $questionTypeId = $additionalData['question_type_id'] ?? null;

        $optionsText = '';
        if (!empty($allOptions)) {
            $optionsText = "\n\nMULTIPLE CHOICE OPTIONS:\n";
            foreach ($allOptions as $i => $option) {
                $optionsText .= ($i + 1) . ". " . strip_tags($option) . "\n";
            }
        }

        return "COMPREHENSIVE EDUCATIONAL CONTENT VALIDATION & ENHANCEMENT WITH QUESTION TYPE ANALYSIS\n\n" .
               "Analyze and provide improvements for ALL aspects of this educational content, including proper question type classification.\n\n" .
               
               "=== CURRENT CONTENT ===\n" .
               "QUESTION: {$question}\n" .
               "CORRECT ANSWER: {$answer}" . $optionsText . "\n" .
               "TOPIC: {$topic}\n" .
               "SUB-TOPIC: {$subtopic}\n" .
               "SUBJECT AREA: {$subjectArea}\n" .
               "EXPLANATION: {$explanation}\n" .
               "HINT: {$hint}\n" .
               "TAGS: {$tags}\n" .
               "DIFFICULTY LEVEL: {$difficultyLevel}\n" .
               "GRADE LEVEL: {$currentGradeLevel}\n" .
               "CURRENT QUESTION TYPE: {$currentQuestionType}\n" .
               "QUESTION TYPE ID: {$questionTypeId}\n\n" .
               
               "=== QUESTION TYPE CLASSIFICATION GUIDE ===\n" .
               "1. MULTIPLE CHOICE: Question with predefined options (A, B, C, D)\n" .
               "2. FILL-IN-THE-BLANK: Question with blanks (____ or ___ or [blank]) to complete\n" .
               "3. TRUE/FALSE: Binary choice questions\n" .
               "4. SHORT ANSWER: Open-ended questions requiring brief responses\n" .
               "5. ESSAY: Questions requiring extended written responses\n" .
               "6. MATCHING: Questions requiring pairing items\n" .
               "7. ORDERING/SEQUENCING: Questions requiring arrangement in order\n" .
               "8. DRAG AND DROP: Interactive questions with draggable elements\n" .
               "9. HOTSPOT: Click-to-select questions on images/diagrams\n" .
               "10. CALCULATION: Mathematical computation questions\n\n" .
               
               "=== CRITICAL FILL-IN-THE-BLANK DETECTION ===\n" .
               "⚠️ IMPORTANT: If the question contains blanks (_____, ____, [blank], or similar) or asks to 'complete the sentence/passage', it should be classified as FILL-IN-THE-BLANK, NOT multiple choice.\n" .
               "❌ COMMON ERROR: Fill-in-the-blank questions incorrectly classified as multiple choice with options that should be the blank answers.\n" .
               "✅ CORRECT: Fill-in-the-blank questions should have the answer as the text that goes in the blank.\n\n" .
               
               "=== COMPREHENSIVE ANALYSIS REQUIREMENTS ===\n" .
               "1. QUESTION TYPE VALIDATION: Correct classification, format consistency, structural accuracy\n" .
               "2. QUESTION QUALITY: Grammar, clarity, factual accuracy, age-appropriateness\n" .
               "3. ANSWER VALIDATION: Correctness, completeness, format alignment with question type\n" .
               "4. TOPIC CLASSIFICATION: Accuracy, specificity, educational taxonomy\n" .
               "5. SUB-TOPIC REFINEMENT: Relevance, granularity, skill alignment\n" .
               "6. EXPLANATION ASSESSMENT: Clarity, pedagogical value, completeness\n" .
               "7. HINT EVALUATION: Helpfulness without giving away the answer\n" .
               "8. TAG OPTIMIZATION: Searchability, categorization, learning objectives\n" .
               "9. DIFFICULTY CALIBRATION: Cognitive load, Bloom's taxonomy, grade appropriateness\n" .
               "10. EDUCATIONAL EFFECTIVENESS: Learning outcomes, engagement, assessment value\n\n" .
               
               "=== REQUIRED JSON OUTPUT FORMAT ===\n" .
               "{\n" .
               "  \"question_type\": {\n" .
               "    \"status\": \"correct|incorrect|needs_clarification\",\n" .
               "    \"current_type\": \"{$currentQuestionType}\",\n" .
               "    \"detected_type\": \"multiple_choice|fill_in_blank|true_false|short_answer|essay|matching|ordering|drag_drop|hotspot|calculation\",\n" .
               "    \"confidence\": 1-10,\n" .
               "    \"reasoning\": \"detailed explanation for classification\",\n" .
               "    \"format_issues\": [\"specific problems with current format\"],\n" .
               "    \"recommended_format\": \"how the question should be formatted for this type\",\n" .
               "    \"is_fill_in_blank_misclassified\": true/false,\n" .
               "    \"blank_detection\": [\"list of blanks found in question text\"]\n" .
               "  },\n" .
               "  \"question\": {\n" .
               "    \"status\": \"correct|needs_fixes|major_rewrite\",\n" .
               "    \"issues\": [\"specific grammar/clarity/accuracy issues\"],\n" .
               "    \"corrected_text\": \"improved question text (if needed)\",\n" .
               "    \"improvement_notes\": \"what was changed and why\"\n" .
               "  },\n" .
               "  \"answer\": {\n" .
               "    \"status\": \"correct|incorrect|partially_correct|format_mismatch\",\n" .
               "    \"issues\": [\"specific problems with current answer\"],\n" .
               "    \"corrected_answer\": \"correct answer (if different)\",\n" .
               "    \"explanation\": \"why this is the correct answer\",\n" .
               "    \"format_alignment\": \"how answer aligns with question type\"\n" .
               "  },\n" .
               "  \"topic\": {\n" .
               "    \"status\": \"accurate|needs_refinement|incorrect\",\n" .
               "    \"current_topic\": \"{$topic}\",\n" .
               "    \"suggested_topic\": \"more appropriate topic classification\",\n" .
               "    \"reasoning\": \"why this topic is better\"\n" .
               "  },\n" .
               "  \"subtopic\": {\n" .
               "    \"status\": \"accurate|needs_refinement|incorrect\",\n" .
               "    \"current_subtopic\": \"{$subtopic}\",\n" .
               "    \"suggested_subtopic\": \"more specific/appropriate sub-topic\",\n" .
               "    \"reasoning\": \"why this sub-topic is better\"\n" .
               "  },\n" .
               "  \"explanation\": {\n" .
               "    \"status\": \"excellent|good|needs_improvement|inadequate|missing\",\n" .
               "    \"issues\": [\"specific problems with current explanation\"],\n" .
               "    \"improved_explanation\": \"enhanced explanation with better pedagogy\",\n" .
               "    \"educational_value\": \"assessment of learning value and clarity\"\n" .
               "  },\n" .
               "  \"hint\": {\n" .
               "    \"status\": \"excellent|good|needs_improvement|inadequate|missing\",\n" .
               "    \"issues\": [\"problems with current hint\"],\n" .
               "    \"improved_hint\": \"better hint that guides without revealing\",\n" .
               "    \"reasoning\": \"why this hint is more effective\"\n" .
               "  },\n" .
               "  \"tags\": {\n" .
               "    \"status\": \"excellent|good|needs_improvement|inadequate\",\n" .
               "    \"current_tags\": [\"{$tags}\"],\n" .
               "    \"suggested_tags\": [\"relevant\", \"searchable\", \"specific\", \"tags\"],\n" .
               "    \"reasoning\": \"why these tags improve discoverability and categorization\"\n" .
               "  },\n" .
               "  \"difficulty\": {\n" .
               "    \"current_level\": \"{$difficultyLevel}\",\n" .
               "    \"assessed_level\": \"beginner|intermediate|advanced|expert\",\n" .
               "    \"grade_level\": \"specific grade recommendation (e.g., 'Grade 6-8')\",\n" .
               "    \"complexity_factors\": [\"what makes this easy/difficult\"],\n" .
               "    \"blooms_taxonomy\": \"remember|understand|apply|analyze|evaluate|create\",\n" .
               "    \"reasoning\": \"justification for difficulty assessment\"\n" .
               "  },\n" .
               "  \"overall_assessment\": {\n" .
               "    \"quality_score\": 1-10,\n" .
               "    \"educational_effectiveness\": \"poor|fair|good|excellent\",\n" .
               "    \"recommended_actions\": [\"prioritized list of improvements\"],\n" .
               "    \"subject_area\": \"detailed subject classification\",\n" .
               "    \"learning_objectives\": [\"what students will learn from this question\"],\n" .
               "    \"prerequisite_knowledge\": [\"what students need to know beforehand\"],\n" .
               "    \"assessment_type\": \"formative|summative|diagnostic|practice\",\n" .
               "    \"question_type_alignment\": \"how well the question type matches the learning objective\"\n" .
               "  },\n" .
               "  \"confidence\": 1-10\n" .
               "}\n\n" .
               "CRITICAL: Respond ONLY with valid JSON. Pay special attention to question type classification - many fill-in-the-blank questions are incorrectly marked as multiple choice. Be thorough, constructive, and educationally focused.";
    }

    /**
     * Validate question type only
     */
    public function validateQuestionTypeOnly($question, $currentAnswer, $allOptions = [], $currentType = 'Unknown')
    {
        if (!$this->isConfigured()) {
            return ['success' => false, 'error' => 'API key not configured'];
        }

        $optionsText = '';
        if (!empty($allOptions)) {
            $optionsText = "\n\nAVAILABLE OPTIONS:\n";
            foreach ($allOptions as $i => $option) {
                $optionsText .= ($i + 1) . ". " . strip_tags($option) . "\n";
            }
        }

        $prompt = "Analyze this educational question and determine the correct question type classification.\n\n" .
                  "QUESTION: {$question}\n" .
                  "CURRENT ANSWER: {$currentAnswer}\n" .
                  "CURRENT TYPE: {$currentType}" . $optionsText . "\n\n" .
                  "QUESTION TYPE OPTIONS:\n" .
                  "1. MULTIPLE_CHOICE: Questions with predefined options\n" .
                  "2. FILL_IN_BLANK: Questions with blanks to complete (_____, ____, [blank])\n" .
                  "3. TRUE_FALSE: Binary choice questions\n" .
                  "4. SHORT_ANSWER: Open-ended brief responses\n" .
                  "5. ESSAY: Extended written responses\n" .
                  "6. MATCHING: Pairing items\n" .
                  "7. ORDERING: Arrangement in sequence\n" .
                  "8. CALCULATION: Mathematical computation\n\n" .
                  "CRITICAL: If question contains blanks (_____, ____, [blank]) or asks to 'complete', it's FILL_IN_BLANK.\n\n" .
                  "Provide JSON response with:\n" .
                  "{\n" .
                  "  \"type_correct\": true/false,\n" .
                  "  \"detected_type\": \"question_type_name\",\n" .
                  "  \"current_type\": \"{$currentType}\",\n" .
                  "  \"confidence\": 1-10,\n" .
                  "  \"reasoning\": \"explanation for classification\",\n" .
                  "  \"is_fill_in_blank_misclassified\": true/false,\n" .
                  "  \"format_issues\": [\"list of format problems\"],\n" .
                  "  \"recommended_changes\": [\"suggested improvements\"]\n" .
                  "}";

        try {
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4o',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are an expert in educational question type classification and assessment design.'],
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'temperature' => 0.1,
                    'max_tokens' => 600,
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
            return [
                'success' => true,
                'result' => $responseData['choices'][0]['message']['content']
            ];

        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function isConfigured()
    {
        return !empty($this->apiKey) && !empty(trim($this->apiKey));
    }

    public function getConfigurationStatus()
    {
        return [
            'api_key_configured' => $this->isConfigured(),
            'api_key_length' => $this->apiKey ? strlen($this->apiKey) : 0,
            'model' => 'gpt-4o',
        ];
    }

    /**
     * Quick topic validation
     */
    public function validateTopicOnly($question, $currentTopic, $currentSubtopic = '')
    {
        if (!$this->isConfigured()) {
            return ['success' => false, 'error' => 'API key not configured'];
        }

        $prompt = "Analyze this educational question and determine the most appropriate topic classification.\n\n" .
                  "QUESTION: {$question}\n" .
                  "CURRENT TOPIC: {$currentTopic}\n" .
                  "CURRENT SUB-TOPIC: {$currentSubtopic}\n\n" .
                  "Provide JSON response with:\n" .
                  "{\n" .
                  "  \"topic_accurate\": true/false,\n" .
                  "  \"suggested_topic\": \"recommended topic\",\n" .
                  "  \"suggested_subtopic\": \"recommended sub-topic\",\n" .
                  "  \"subject_area\": \"broad subject classification\",\n" .
                  "  \"confidence\": 1-10,\n" .
                  "  \"reasoning\": \"explanation for classification\"\n" .
                  "}";

        try {
            $response = $this->client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4o',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are an expert in educational taxonomy and subject classification.'],
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'temperature' => 0.1,
                    'max_tokens' => 400,
                ],
            ]);

            $responseData = json_decode($response->getBody(), true);
            return [
                'success' => true,
                'result' => $responseData['choices'][0]['message']['content']
            ];

        } catch (\Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}