<div class="row" id="dvall">
    <div class="col-10">
        <div class="card mb-4">

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <form action="{{ route('process') }}" method="POST">
                        @csrf
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Transaction ID:</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>


                                        <p class="text-sm font-weight-bold mb-0">{{ $transactionId }} </p>
                                        <input id="transactionId" name="transactionId" value="{{ $transactionId }}"
                                            type="hidden" />
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Service</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $resource }}</p>
                                        <input name="transactionId" value="{{ $transactionId }}" type="hidden" />
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Amount</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $amount }}</p>
                                        <input name="amount" value="{{ $amount }}" type="hidden" />
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Name</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">
                                            {{ $student->surname . ' ' . $student->firstname . ' ' . $student->m_name }}
                                        </p>
                                        <input id="payerName" name="payerName"
                                            value="{{ $student->surname . ' ' . $student->firstname . ' ' . $student->m_name }}"
                                            type="hidden" />
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Email:</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $student->email }} </p>
                                        <input id="payerEmail" name="payerEmail" value="{{ $student->email }}"
                                            type="hidden" />
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2">

                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Phone:</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $student->p_number }}</p>
                                        <input name="payerPhone" value="{{ $student->p_number }}" type="hidden" />
                                        <input name="paymenttype" value="RRRGEN" type="hidden" />

                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        <input class="btn btn-success" type="submit" name="" value="Continue">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <script type="text/javascript">
                        function PrintElem(elem) {
                            //Popup($(elem).html());
                            //var d = $('#' + elem).html();
                            Popup($('#' + elem).html());
                        }

                        function Popup(data) {
                            var mywindow = window.open('', 'new div', 'height=500,width=800');
                            mywindow.document.write('<html><head><title></title>');
                            //mywindow.document.write("<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\" media=\"all\"/>");
                            mywindow.document.write('</head><body >');
                            mywindow.document.write(data);
                            mywindow.document.write('</body></html>');

                            mywindow.print();
                            mywindow.close();

                            return true;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
