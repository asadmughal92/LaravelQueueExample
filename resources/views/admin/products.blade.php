
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <table id="productsTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
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
            $('#productsTable').DataTable({
                ajax: {
                    url: '{{ route("products") }}', // Use the named route for the controller method
                    dataSrc: ''
                },
                columns: [
                    { data: 'id' },
                    { data: 'product_name' },
                    { data: 'price' }
                ]
            });
        });
    </script>
@endsection

