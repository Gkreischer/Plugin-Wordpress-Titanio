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
    <section class="container-fluid ps-0">
        <div class="row">
            <div class="col-12">
                <div class="card bg-gradient text-light">
                    <div class="card-header border border-0 ps-0 d-flex justify-content-between">
                        <h3 class="card-title">Atividades Recentes</h3>
                        <button id="botao-adicionar-atividade" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-adicionar-atividade" type="button">
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
                                                    <th scope="col" style="width: 50%;">OBS</th>
                                                    <th scope="col" style="width: 5%;">Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <div class="btn btn-primary">
                                                            <i class="fa fa-search"></i>
                                                        </div>
                                                    </td>
                                                </tr>

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
    <!-- Modal -->
    <div class="modal fade bg-dark" id="modal-adicionar-atividade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nova Atividade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-activity">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nome</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label fw-bold">Data</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold" for="description">Descrição</label>
                            <textarea class="form-control" id="description" rows="5" name="description"></textarea>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="save-activity">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script>
        jQuery(document).ready(function($) {


            $('#save-activity').on('click', function() {
                var form = $('#form-activity').serialize();
                console.log(form);

                $.ajax({
                    method: 'post',
                    url: '<?php echo get_rest_url(null, '/central-agencia-titanio/v1/activities') ?>',
                    headers: {
                        'X-WP-Nonce': '<?php echo wp_create_nonce('wp_rest') ?>'
                    },
                    data: form,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });

        });
    </script>
</main>