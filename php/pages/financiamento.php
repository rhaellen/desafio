<?php
$vetor_taxa = ['6', '12', '18', '24', '36'];
?>
<div class="col-12">
    <form id="formulario" class="my-5">
        <div class="row">
            <div class="col-lg-5">
                <label for="">Valor do financiamento (R$)</label>
                <input type="text" name="valor" class="form-control">
            </div>

            <div class="col-lg-5">
                <label for="">Número de Parcelas</label>
                <select class="form-select" name="sel">
                    <option disabled selected>Selecione ...</option>
                    <?php foreach ($vetor_taxa as $key => $dados) { ?>
                        <option value="<?php echo "{$dados}" ?>"><?php echo "{$dados}" ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-lg-2 d-flex align-items-end">
                <button type="submit" class="btn btn-danger">Enviar</button>
            </div>
        </div>
    </form>

    <div id="resultado" class="text-center">
    </div>
</div>

<script>
    var formulario = document.querySelector('#formulario');

    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        var dados_form = new FormData(formulario);
        var val_1 = dados_form.get('valor');
        var val_2 = dados_form.get('sel');

        if (val_2 > 12) {
            document.querySelector('footer').style.position = 'unset';
        }



        fetch("https://us-central1-creditoexpress-dev.cloudfunctions.net/teste-backend", {
            method: "POST",
            headers: {'Content-Type: application/json'},
            mode: 'no-cors',
            data{
                "numeroParcelas": 12,
                "valor": 10000,
                "taxaJuros": 0.04
            }

        })
            .then(r => r.json())
            .then(function (retorno) {
                console.log('DEU BOM');

                // Abaixo vou dar o console log em tudo que peguei no JSON que recebi no fetch
                console.log(retorno);

                // Nesse aqui vou dar o console log só no HTML
                console.log(retorno.valor_html);

                document.querySelector('#resultado').innerHTML = retorno.valor_html;
            })
            .catch(function (e) {
                console.log(e)
            });

    });
</script>