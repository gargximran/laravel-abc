<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Per Product Price</th>
        <th>Total Price</th>
        <th>Product Code</th>
        <th>Invoice Code</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Customer Phone</th>
        <th>Customer Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->created_at->format('d/m/Y') }}</td>
            <td>{{ $sale->Product()->withTrashed()->first()->name }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>{{ $sale->per_product_price }} tk</td>
            <td>{{ $sale->totalPrice }} tk</td>
            <td>{{ $sale->Product()->withTrashed()->first()->code }}</td>
            <td>{{ $sale->Invoice->invoice_sl }}</td>
            <td>{{ $sale->Invoice->first_name." ".$sale->Invoice->last_name }}</td>
            <td>{{ $sale->Invoice->address }}</td>
            <td>{{ $sale->Invoice->phone }}</td>
            <td>{{ $sale->Invoice->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>