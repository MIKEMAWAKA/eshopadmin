<div class="table-responsive-sm">
    <table class="table table-striped" id="productImages-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Product Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productImages as $productImage)
            <tr>
                <td>{{ $productImage->name }}</td>
            <td>{{ $productImage->product_id }}</td>
                <td>
                    {!! Form::open(['route' => ['productImages.destroy', $productImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productImages.show', [$productImage->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('productImages.edit', [$productImage->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>