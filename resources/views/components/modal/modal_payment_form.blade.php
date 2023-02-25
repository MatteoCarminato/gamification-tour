<div class="modal fade" id="modal_payment_form">
    <div class="modal-dialog modal-dialog-centered text-center modal-xl" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{ __('Selecione a Forma de Pagamento') }}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <div class="card-body">

            <form method="GET" class="mb-5">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Procurar..." aria-label="Search" aria-describedby="button-addon2"  id="search-input">
                </div>
            </form>

                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-bordered mb-0" id="tableFormaPagamento">
                        <thead>
                            <th>{{ __('Forma de Pagamento') }}</th> 
                            <th class="text-right sorting_asc_disabled sorting_desc_disabled">{{ __('Selecionar') }}</th>
                        </thead>
                        <tbody id="modal-body">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                </div>
        
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Salvar</button> <button class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script> 

$(document).ready(function() {
    $('#modal_payment_form').on('show.bs.modal', function(e) {
    var modal = $(this);
    var url = "{{ route('payment_forms.busca') }}"

    // Fazer a primeira chamada sem nenhum valor no input
    $.ajax({
        url: url,
        success: function(response) {
            console.log(response)
            var tbody = modal.find('#modal-body');
            tbody.empty();
            response.data.forEach(function(payment_form) {
                tbody.append(`<tr>
                                <td>${payment_form.forma_pagamento}</td>
                                <td>
                                <button type="button" class="btn btn-primary select-btn" data-value="${payment_form.id}" data-name="${payment_form.forma_pagamento}" data-toggle="modal" data-target="#modal" >
                                            Selecionar
                                        </button>
                                        </td>
                            </tr>`);
            });
        }
    });

    // Quando o valor do input mudar, atualizar a tabela
    $('#search-input').on('input', function() {
        $.ajax({
            url: url,
            data: {
                search: $('#search-input').val()
            },
            success: function(response) {
                console.log('digiitei',response)
                var tbody = modal.find('#modal-body');
                tbody.empty();
                response.data.forEach(function(payment_form) {
                    tbody.append(`<tr>
                                    <td>${payment_form.forma_pagamento}</td>
                                    <td>
                                     <button type="button" class="btn btn-primary select-btn" data-value="${payment_form.id}" data-name="${payment_form.forma_pagamento}" data-toggle="modal" data-target="#modal" >
                                            Selecionar
                                        </button>
                                        </td>
                                </tr>`);
                });
            }
        });
    });


    $(document).on('click', '.select-btn', function() {
        var paymentFormId = $(this).data('value');
        var paymentFormName = $(this).data('name');
        
        
        $('#cod_forma_pagamento-input').val(paymentFormId);
        $('#forma_pagamento-input').val(paymentFormName);

        $('#modal_payment_form').modal('hide');
    });

});
});
    
</script>