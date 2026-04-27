@extends('layouts.app')

@section('content')
<div class="calendar-container">
    <div class="calendar-header">
    <button id="prevMonth" class="nav-btn">◀</button>
    <h2 id="calendar-title" class="calendar-title"></h2>
    <button id="nextMonth" class="nav-btn">▶</button>
</div>

    <table class="calendar-table">
        <thead>
            <tr>
                <th>Sun</th><th>Mon</th><th>Tue</th>
                <th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
            <!-- JS will fill this -->
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/calendar.js') }}"></script>
@endpush
