<table class="table table-striped table-responsive table-bordered">
    <tr>
        <td>Prouducto</td>
        <td>Cantidad</td>
        <td>Total</td>
    </tr>
    @foreach($bills as $bill)
        @foreach($bill->purchases as $purchase)
            <tr>
                <td>{{ $purchase->product_name }}</td>
                <td>{{ $purchase->amount }}</td>
                <td>{{ $purchase->cost }}</td>
            </tr>
        @endforeach
    @endforeach
</table>