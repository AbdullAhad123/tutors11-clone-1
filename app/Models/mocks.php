<?php

namespace App\Models;

use App\Filters\QueryFilter;
use App\Traits\SecureDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use PHPUnit\TextUI\CliArguments\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;

class mocks extends Model
{

    use HasFactory;
    use SoftDeletes;
    use SecureDeletes;
    use SchemalessAttributesTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'mocks';

    protected $guarded = [];

    protected $casts = [
        'is_paid' => 'boolean',
        'is_active' => 'boolean',
        'is_private' => 'boolean',
        'can_redeem' => 'boolean'
    ];

    protected $schemalessAttributes = [
        'settings',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    protected static function booted()
    {
        static::creating(function ($subCategory) {
            $subCategory->attributes['code'] = 'mock_'.Str::random(11);
            $subCategory->attributes['slug'] = $originalSlug = Str::slug($subCategory->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $subCategory->attributes['slug'])->exists()) {
                $subCategory->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });

        static::updating(function ($subCategory) {
            $subCategory->attributes['slug'] = $originalSlug = Str::slug($subCategory->attributes['title']);
            $count = 1;
            while (static::withTrashed()->where('slug', $subCategory->attributes['slug'])->exists()) {
                $subCategory->attributes['slug'] = $originalSlug . '-' . $count++;
            }
        });
    }

    public function updateMeta()
    {
        $this->total_questions = $this->questions()->count();
        $this->total_duration = $this->mockSections()->sum('total_duration');
        $this->total_marks = $this->mockSections()->sum('total_marks');
        $this->update();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function mockSections()
    {
        return $this->hasMany(mock_sections::class,'mock_id');
    }

    public function mockSchedules()
    {
        return $this->hasMany(mock_schedules::class,'mock_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'mock_questions', 'mock_id', 'question_id');
    }

    public function sessions()
    {
        return $this->hasMany(mock_sessions::class,'mock_id');
    }

    public function mockType()
    {
        return $this->belongsTo(MockTypes::class);
    }
    public function suggestedmock()
    {
        return $this->belongsTo(SuggestedMockTest::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function scopeWithSettings(): Builder
    {
        return $this->settings->modelCast();
    }

    public function scopePublished($query)
    {
        $query->where('is_active', true);
    }

    public function scopeIsPublic($query)
    {
        $query->where('is_private', false);
    }

    public function scopeIsPrivate($query)
    {
        $query->where('is_private', true);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

}
