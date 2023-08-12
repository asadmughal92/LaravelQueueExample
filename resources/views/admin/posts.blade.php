
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>
    <table id="postsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
         $(document).ready(function () {
            // Initialize DataTables with AJAX data source
            $('#postsTable').DataTable({
                ajax: {
                    url: '{{ route("posts") }}', // Use the named route for the controller method
                    dataSrc: ''
                },
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'body' }
                ]
            });
        });
    </script>
@endsection

