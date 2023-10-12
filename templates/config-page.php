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
<section class="container p-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 class="card-title">Lista de plugins</h5>
                    <div class="card-body p-0">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-12 ps-md-0">
                                    <h5>Plugins Titânicos</h5>
                                    <div class="table">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $plugins = [
                                                    'all-in-one-wp-security-and-firewall' => '5.2.4',
                                                    // Adicione outros plugins aqui
                                                ];
                                                foreach ($plugins as $name => $version) {
                                                    $isPluginActive = is_plugin_active($name);
                                                    $plugin_slug = $name;
                                                    $plugin_version = $version;
                                                    echo
                                                    "
                                                    <tr>
                                                        <td>" . $name . "</td>
                                                        <td>" . $version . "</td>
                                                        <td class='text-center'>" . (!$isPluginActive ? "<button class='btn btn-primary' id='instalar-button' data-plugin-name='$name' data-plugin-version='$plugin_version'>Instalar</button>" : "<button class='btn btn-danger' id='remover-button' data-plugin-name='$name'>Remover</button>") . "</td>
                                                    </tr>";
                                                }
                                                ?>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#instalar-button').on('click', function() {
            var pluginName = $(this).data('plugin-name');
            var pluginVersion = $(this).data('plugin-version');

            // Faça o download e instalação usando o nome e a versão
            // Certifique-se de usar pluginName e pluginVersion no processo de download.

            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                    action: 'instalar_plugin',
                    plugin_name: pluginName,
                    plugin_version: pluginVersion
                })
                .done(function(response) {
                    // Lidar com a resposta da instalação aqui
                    console.log(response);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Lidar com erros da solicitação aqui
                    console.error(textStatus, errorThrown);
                });
        });
    });
</script>