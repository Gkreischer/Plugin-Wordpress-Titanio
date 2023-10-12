<main id="config_page">
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
<section class="container-fluid px-0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h3 class="card-title">Plugins Titânicos</h3>
                <div class="card-body p-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-md-12 ps-md-0">
                                <div class="table">
                                    <?php
                                    $plugins = TITANIO_PLUGINS;
                                    $plugins_category = TITANIO_PLUGINS_CATEGORY;

                                    foreach ($plugins_category as $category) {
                                    ?>
                                        <h5 class="fw-bold text-capitalize pt-3"><?= $category; ?></h5>
                                        <table class="table table-striped table-bordered table-sm table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Versão</th>
                                                    <th scope="col">Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">

                                                <?php
                                                foreach ($plugins as $name => $config) {
                                                    if ($config['category'] == $category) {
                                                        $isPluginActive = in_array($name . '/' . $config['entry_file'], apply_filters('active_plugins', get_option('active_plugins')));
                                                        $plugin_slug = $name;
                                                        $plugin_version = $config['version'];
                                                        $plugin_entry = $config['entry_file'];
                                                        $plugin_category = $config['category'];
                                                ?>

                                                        <tr>
                                                            <td style="width: 50%;"><?php echo $plugin_slug; ?></td>
                                                            <td><?php echo $plugin_version; ?></td>
                                                            <td class="text-center">
                                                                <?php if (!$isPluginActive) { ?>
                                                                    <button class="btn btn-primary install-button btn-sm w-100 fw-bold" data-plugin-name="<?php echo $name; ?>" data-plugin-version="<?php echo $plugin_version; ?>" data-plugin-entry="<?php echo $plugin_entry; ?>"><span>Instalar</span></button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-danger remove-button btn-sm w-100 fw-bold" data-plugin-name="<?php echo $name; ?>" data-plugin-version="<?php echo $plugin_version; ?>" data-plugin-entry="<?php echo $plugin_entry; ?>"><span>Remover</span></button>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>

                                    <?php
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<script>
    jQuery(document).ready(function($) {

        // Instale ou remova o plugin
        $('.install-button, .remove-button').on('click', function() {
            var button = $(this); // Armazena uma referência ao botão
            var pluginName = button.data('plugin-name');
            var pluginVersion = button.data('plugin-version');
            var pluginEntryFile = button.data('plugin-entry');
            var isInstallButton = button.hasClass('install-button');

            // Obtenha a referência ao elemento de ícone de carregamento
            var loadingIcon = $('<i class="fa fa-spinner" aria-hidden="true"></i>');

            //Desabilita o botão para evitar que seja executado mais de uma vez
            button.prop('disabled', true);

            // Oculte o texto do botão e adicione o ícone de carregamento
            button.html(loadingIcon);

            // Faça o download e instalação ou remoção usando o nome e a versão
            // Certifique-se de usar pluginName e pluginVersion no processo de download.

            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                    action: isInstallButton ? 'central_agencia_titanio_install_plugin' : 'central_agencia_titanio_remove_plugin',
                    plugin_name: pluginName,
                    plugin_version: pluginVersion,
                    plugin_entry_file: pluginEntryFile
                })
                .done(function(response) {
                    // Lidar com a resposta da instalação ou remoção aqui

                    console.log(response);
                    var isSuccess = response.success;

                    // Restaure o botão para o texto original ou "Remover" ou "Instalar"
                    if (isInstallButton && isSuccess) {
                        button.removeClass('btn-primary').addClass('btn-danger');
                        button.removeClass('install-button').addClass('remove-button').text('Remover');
                    } else {
                        button.removeClass('btn-danger').addClass('btn-primary');
                        button.removeClass('remove-button').addClass('install-button').text('Instalar');
                    }

                    // Remova o ícone de carregamento
                    loadingIcon.remove();

                    // Habilita o botao para executar a requisição
                    button.prop('disabled', false);
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    // Lidar com erros da solicitação aqui
                    console.error(textStatus, errorThrown);
                    // Restaure o botão para o texto original ou "Remover" ou "Instalar" em caso de falha
                    button.removeClass('btn-danger').addClass('btn-primary');
                    button.removeClass('remove-button').addClass('install-button').text('Instalar');
                    // Remova o ícone de carregamento
                    loadingIcon.remove();
                });
        });
    });
</script>
</main>