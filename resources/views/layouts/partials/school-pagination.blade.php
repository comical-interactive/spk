@if (request()->has('take'))
    {{ $schools->appends(['take' => request('take')])->render() }}
@else
    {{ $schools->links() }}
@endif