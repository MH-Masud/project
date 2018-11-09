@extends('frontEnd.master')

@section('mainContent')
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-14">
            <div class="well lead text-center text-success">Finally give your payment info here</div>
            <h3 class="text-center">Payment Form</h3>
            <hr>
            {!! Form::open(['url'=>'/checkout/save-order','method'=>'POST','class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="col-lg-5 col-lg-offset-2">
                    <div class="">
                      <label><input type="radio" name="paymentType" value="cashOnDelivery">  Cash On Delivery</label>
                  </div>
                  <div class="">
                      <label><input type="radio" name="paymentType" value="bkash">  Bkash</label>
                  </div>
                  <div class="">
                      <label><input type="radio" name="paymentType" value="paypal">  Paypal</label>
                  </div>
              </div>
          </div>


          <div class="form-group">
            <div class="col-lg-5  col-lg-offset-4" style="text-align: center;">
                <input type="submit" name="submit" value="Submit Order" class="btn btn-success btn-lg">
            </div>
            <div>

            </div>

        </div>
        {!! Form::close()!!}

    </div>
</div>
</div>
@endsection