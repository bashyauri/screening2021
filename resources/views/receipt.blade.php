<style>
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}




</style>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
   

</head>
<body>
    <div class="card">
        <div class="card-body">
<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            Remita:
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                {{$RRR}}
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
              
                <button onclick="javascript:window.print();" type="button" class="btn btn-outline-secondary btn-lg"><i class="fas fa-print"></i>Print</button>
               
                
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <img alt="Image placeholder" src="../assets/img/logos/logo.jpg">
                           
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <form action="https://login.remita.net/remita/ecomm/finalize.reg" name="SubmitRemitaForm" method="POST">
                <hr class="row brc-default-l1 mx-n1 mb-4" />
                    @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$fullname}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                <i class="fas fa-envelope"></i>
                                <b class="text-600">{{$email}}</b>
                            </div>
                            
                            <div class="my-1"><i class="fas fa-phone"></i> <b class="text-600">{{$phone}}</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                @if ($response==01)
                                    Reciept
                                @else
                                Invoice
                                @endif
                               
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$orderId}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> {{$time}}</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> 
                               @if ($response == 21 )
                               <span class="badge bg-gradient-warning">{{$message}}</span>
                               
                               @elseif($response ==01)
                               <span class="badge bg-gradient-success">{{$message}}</span>
                               @elseif($response ==00)
                               <span class="badge bg-gradient-success">{{$message}}</span>
            
                                   
                               @else
                                <span class="badge bg-gradient-primary">{{$message}}</span>
                               @endif
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

               
                     

                        

                        

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                   
            <div class="table-condensed">
                <table class="table table-responsive  border-5 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Payment Type</th>
                            <th>RRR</th>
                            <th>Phone</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        
                        <tr>
                            <td>1</td>
                            <td>{{$resource}}</td>
                            <td>{{$RRR}}</td>
                            <td class="text-95">{{$phone}}</td>
                            <td class="text-secondary-d2"><strong>{{$amount}}</strong></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
        

                    <div class="row ">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Wufpbk Online Services
                        </div>

                        
                            <input name="merchantId" value="{{$merchantId}}" type="hidden">

                            <input name="hash" value="{{$hash2}}" type="hidden">
                            
                            <input name="rrr" value="{{$RRR}}" type="hidden">
                            
                            <input name="responseurl" value="{{$responseurl2}}" type="hidden">
                            
                            <div class="row">
                                
                                @if ($response == 01 || $response == 00)
                                <button type="submit" class="btn bg-gradient-success ">Continue</button>
                                @else
                                <button type="submit" class="btn bg-gradient-primary ">Pay Now</button>
                                @endif
                               
                            </div>  

                    <hr />

                   
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
    <!-- Core -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>

<!-- Theme JS -->
<script src="../assets/js/soft-ui-dashboard.min.js"></script>
</body>