@if(Auth::user()->hasRole('parent') || Auth::user()->hasRole('teacher'))
    @include('parentsidebar.sidebar')
@elseif(Auth::user()->hasRole('student'))
    @include('parentsidebar.User.sidebar')
@elseif(Auth::user()->hasRole('instructor'))
    @include('parentsidebar.Instructor.sidebar')
@elseif(Auth::user()->hasRole('admin'))
    @include('parentsidebar.Admin.sidebar')
@endif
