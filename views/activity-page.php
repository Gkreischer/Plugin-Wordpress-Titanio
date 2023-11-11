<main id="activity-page">
    <section class="container-fluid text-center">
        <div class="row">
            <div class="col ps-0">
                <?php
                $image_url = plugins_url('../assets/images/banner.jpg', __FILE__);
                ?>
                <img class="img-fluid w-100" src="<?php echo $image_url; ?>">
            </div>
        </div>
    </section>
    <section id="content" class="container-fluid ps-0">
        <div class="row">
            <div class="col-12">
                <div class="card bg-gradient text-light">
                    <div class="card-header border border-0 ps-0 d-flex justify-content-between">
                        <h3 class="card-title">Atividades Recentes</h3>
                        <button id="botao-adicionar-atividade" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-atividade" type="button">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-12 ps-md-0">
                                    <div class="table">

                                        <h5 class="fw-bold text-uppercase pt-3"></h5>
                                        <table class="table table-striped table-bordered table-sm table-hover table-responsive table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 10%;">Data</th>
                                                    <th scope="col" style="width: 10%;">Ticket</th>
                                                    <th scope="col" style="width: 30%;">Autor</th>
                                                    <th scope="col" style="width: 40%;">OBS</th>
                                                    <th scope="col" style="width: 10%;">Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Adiciona Atividade-->
    <form id="form-activity">

        <div class="modal fade bg-dark" id="modal-atividade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Atividade</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Autor</label>
                            <input type="text" class="form-control" id="name" name="author" required minlength="3" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Número do ticket</label>
                            <input type="text" class="form-control" id="ticket-number" name="ticket_number" required minlength="3" maxlength="30">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label fw-bold">Data</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold" for="description">Descrição</label>
                            <textarea class="form-control" id="description" rows="5" name="description" required></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <div class="row ">
                                <div class="col d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="virus_scan" name="virus_scan">
                                    <label class="form-check-label fw-bold" for="virus_scan">Scan de Vírus</label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="theme_update" name="theme_update">
                                    <label class="form-check-label fw-bold mb-0" for="theme_update">Atualização de Tema</label>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <input type="checkbox" class="form-check-input" id="plugins_update" name="plugins_update">
                                    <label class="form-check-label fw-bold" for="plugins_update">Atualização de Plugins</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="obs" class="form-label fw-bold" for="obs">OBS</label>
                            <textarea class="form-control" id="obs" rows="5" name="obs"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="button-form-submit" data-id="null">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Fim Modal Deleta atividade -->
    <form id="form-delete">

        <div class="modal fade bg-dark" id="modal-confirma-exclusao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Atividade</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <p>Deseja realmente deletar esse registro?</p>
                                    <p class="text-body-secondary"><strong>Isso não poderá ser desfeito</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" id="button-form-submit-delete" data-id="null">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Fim Modal Deleta Atividade -->
    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
    <!-- Fim Toast -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script>
        jQuery(document).ready(function($) {

            let activitiesList = [];

            function resetForm() {
                $('#form-activity')[0].reset();
            }

            // Reseta o form ao clicar no botão de adicionar
            $('#botao-adicionar-atividade').click(function() {
                $('#button-form-submit').attr('data-id', 'null');
                resetForm();
            })

            // Obtem as atividades do BD
            $.ajax({
                method: 'get',
                url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>',
                headers: {
                    'X-Wp-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                },
                success: function(response) {
                    var tbody = $('.table tbody');

                    if (response.length > 0) {
                        activitiesList = response;
                        console.log(activitiesList)
                        for (var i = 0; i < activitiesList.length; i++) {
                            var activity = activitiesList[i];

                            tbody.append(`
                                    <tr>
                                        <td>${new Date(activity.date).toLocaleDateString('pt-BR')}</td>
                                        <td>#${activity.ticket_number}</td>
                                        <td>${activity.author}</td>
                                        <td>${activity.description}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary" id="ver-atividade" data-bs-toggle="modal" data-bs-target="#modal-atividade" data-id="${activity.id}" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <button id="botao-modal-remover-atividade" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-confirma-exclusao" data-id="${activity.id}" type="button">
                            <i class="fa fa-trash"></i>
                        </button>
                                        </td>
                                    </tr>
                                `);

                        }

                    } else {
                        tbody.append(`
                                <tr>
                                    <td colspan="5">Nenhuma atividade encontrada</td>
                                </tr>
                            `);
                    }
                },
                error: function(error) {
                    console.error(error.responseText);
                }
            });


            // Carrega na modal as informações de uma atividade específica
            $(document).on('click', '#ver-atividade', function() {
                var activityId = $(this).data('id');
                $('#button-form-submit').attr('data-id', activityId);

                $.ajax({
                    method: 'get',
                    url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>/' + activityId,
                    headers: {
                        'X-Wp-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                    },
                    success: function(response) {
                        console.log($('#form-activity')[0]);
                        $('#ticket-number').val(response.ticket_number);
                        $('#name').val(response.author);
                        // The specified value "03/11/2023" does not conform to the required format, "yyyy-MM-dd".
                        var formattedDate = new Date(response.date);
                        formattedDate = formattedDate.toISOString().split('T')[0];
                        $('#date').val(formattedDate);
                        $('#description').val(response.description);
                        $('#virus_scan').prop('checked', response.virus_scan == 1 ? true : false);
                        $('#theme_update').prop('checked', response.theme_update == 1 ? true : false);
                        $('#plugins_update').prop('checked', response.plugins_update == 1 ? true : false);
                        $('#obs').val(response.obs);
                    },
                    error: function(error) {
                        console.error(error.responseText);
                    },
                    complete: function() {
                        $('#modal-atividade').modal('show');

                    }
                });
            })
        });

        // Envio do formulário
        $('#form-activity').submit(function() {
            event.preventDefault();

            var form = $(this).serialize();

            if($('#button-form-submit').data('id') != 'null') {
                form += '&id=' + $('#button-form-submit').data('id');
            }

            console.log(form);

            function showToast(toastElement) {
                var toastElement = $('#liveToast');
                const toastBootstrap = new bootstrap.Toast(toastElement[0]);
                toastBootstrap.show();
            }

            $.ajax({
                method: 'post',
                url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>',
                headers: {
                    'X-Wp-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                },
                data: form,
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                }

            });

            // Deleta uma atividade
            $(document).on('click', '#botao-modal-remover-atividade', function() {
                console.log('clicado');

                var activityId = $(this).data('id');
                $('#botao-modal-remover-atividade').attr('data-id', activityId);

                $('#form-delete').submit(function() {
                    event.preventDefault();
                    console.log('enviando com a ID', activityId);
                    $.ajax({
                    method: 'post',
                    body: 'id=' + activityId,
                    url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>/' + activityId + '/delete',
                    headers: {
                        'X-Wp-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
                })
            });

        });

        // Envio do formulário
        $('#form-activity').submit(function() {
            event.preventDefault();

            var form = $(this).serialize();

            if ($('#button-form-submit').data('id') != 'null') {
                form += '&id=' + $('#button-form-submit').data('id');
            }

            console.log(form);

            function showToast(toastElement) {
                var toastElement = $('#liveToast');
                const toastBootstrap = new bootstrap.Toast(toastElement[0]);
                toastBootstrap.show();
            }

            $.ajax({
                method: 'post',
                url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>',
                headers: {
                    'X-Wp-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                },
                data: form,
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                },
                error: function(error) {
                    console.error(error);
                }

            });

        });

        
    </script>
</main>