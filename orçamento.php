<?php
    //Connect BD
    require_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento Rápido</title>
    <style>
        .php-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column;">
    <h1>ORÇAMENTOS RÁPIDOS</h1>
    <form action="orçamento.php" method="POST">
        <label for="valor1">Parede 1:</label>
        <input type="text" id="value1" name="value1" >
        <div style="margin-bottom: 0.5em;"></div>

    <form action="orçamento.php" method="POST">
        <label for="valor2">Parede 2:</label>
        <input type="text" id="value2" name="value2" >
        <div style='margin-bottom: 0.5em;'></div>
    
    <div style="display: flex; justify-content: center;">

    <select name = "tOrçamento" id = "tOrçamento" method = "POST">
        <option value="gLiso">Gesso Liso</option>
        <option value="pLaminado">Piso Laminado</option>
    </select>
    </div>

    <div style='margin-bottom: 0.5em;'></div>

    <div id="checkboxSection" action = "orçamento.php" style="margin-bottom: 0.5em; display: none;" method = "POST">
        <div style="display: inline-block;">
        <input type="checkbox" id="smart" name="smart">
        <label for="smart">Smart</label>
        <input type="checkbox" id="vision" name="vision">
        <label for="vision">Vision</label>
        <input type="checkbox" id="elignawide" name="elignawide">
        <label for="elignawide">Eligna</label>
        <input type="checkbox" id="premiere" name="premiere">
        <label for="premiere">Premiere</label>
        </div>
    </div> 

    <div style="display: flex; justify-content: center;">

    <button type= "submit" class= "btn btn-primary" name="btnEnviar">Enviar</button>
    </div>
    
    <div class="php-section">
    
          
    
<?php
    //Recebendo informações do Formulário
    if(isset($_POST['btnEnviar'])){
        $select = $_POST['tOrçamento'];

        //Verifica se selecionou Gesso Liso
        if($select == "gLiso"){
            $value1 = $_POST['value1'];
            $value2 = $_POST['value2']; 

                
                if($value1 != "" && $value2 != ""){
                    $value1 = str_replace(',', '.', $value1);
                    $value2 = str_replace(',', '.', $value2);
                    $value3 = $value1 * $value2;
                    $price = 109.90;
                    $fValue = $value3 * $price;
                    $placa = 2;
                    $vPlaca = ($value3/$placa) + 1;
                    $mLinear = ($value1  * 2) + ($value2 * 2);

                    //Formatando para visualização do usuario
                    $value3 = number_format($value3,2,',','.');
                    $fValue = number_format($fValue,2,',','.');
                    $vPlaca = number_format($vPlaca,0,',','.');

                    echo "<div style='margin-bottom: 1.0em;'></div>";
                    echo "<u><strong> Metragem </strong></u>";
                    echo "<div style='margin-bottom: 0.1em;'></div>";
                    echo "$value3 m² de Gesso Liso";
                    echo "<div style='margin-bottom: 0.1em;'></div>";
                    echo "Metro Linear: $mLinear";
                    echo "<div style='margin-bottom: 0.7em;'></div>";
                    echo "<u><strong> Valor Final </strong></u>";
                    echo "<div style='margin-bottom: 0.1em;'></div>";
                    echo "R$ $fValue";
                    echo "<div style='margin-bottom: 0.7em;'></div>";
                    echo "<u><strong> Materiais </strong></u>";
                    echo "<div style='margin-bottom: 0.1em;'></div>";
                    echo "$vPlaca placas são necessarias";

                    }elseif($value1 == ""){
                        echo "<br></br>";
                        echo "Insira um valor na primeira linha";

                    }elseif($value2 == ""){
                        echo "<br></br>";
                        echo "Insira um valor na segunda linha";
                    }
            }

        //Verifica se selecionou Piso Laminado
        if($select == "pLaminado"){
            $value1 = $_POST['value1'];
            $value2 = $_POST['value2'];

            //Verificando se foi preenchido o formulario.
            if($value1 != "" && $value2 != ""){
                $value1 = str_replace(',', '.', $value1);
                $value2 = str_replace(',', '.', $value2);
                $value3 = $value1 * $value2;

                //Verifica qual tipo de piso foi selecionado
                if(isset($_POST['smart'])){
                    $smart = 129.90;
                    $pSmart = $value3 * $smart;

                    //Formatando para visualização do usuario
                    $value3 = number_format($value3,2,',','.');
                    $pSmart = number_format($pSmart,2,',','.');

                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Metragem </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "$value3 m² de Piso Laminado Smart";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Valor Final </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "R$ $pSmart";

                //Verifica qual tipo de piso foi selecionado
                }elseif(isset($_POST['vision'])){
                    $vision = 199.90;
                    $pVision = $value3 * $vision;

                    //Formatando para visualização do usuario
                    $value3 = number_format($value3,2,',','.');
                    $pVision = number_format($pVision,2,',','.');

                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Metragem </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "$value3 m² de Piso Laminado Vision";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Valor Final </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "R$ $pVision";

                //Verifica qual tipo de piso foi selecionado
                }elseif(isset($_POST['elignawide'])){
                    $eligna = 189.90;
                    $pEligna = $value3 * $eligna;

                    //Formatando para visualização do usuario
                    $value3 = number_format($value3,2,',','.');
                    $pEligna = number_format($pEligna,2,',','.');

                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Metragem </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "$value3 m² de Piso Laminado Eligna";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Valor Final </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "R$ $pEligna";
                
                //Verifica qual tipo de piso foi selecionado
                }elseif(isset($_POST['premiere'])){
                    $premiere = 119.90;
                    $pPremiere = $value3 * $premiere;

                    //Formatando para visualização do usuario
                    $value3 = number_format($value3,2,',','.');
                    $pPremiere = number_format($pPremiere,2,',','.');

                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Metragem </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "$value3 m² de Piso Laminado Premiere";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "<u><strong> Valor Final </strong></u>";
                    echo "<div style='margin-bottom: 0.5em;'></div>";
                    echo "R$ $pPremiere";


                }
                
            
            }
         }
    }
?>
    </div>
<script>
     // Função para lidar com a mudança de opção no select
    document.getElementById('tOrçamento').addEventListener('change', function() {
        var selectValue = this.value;
        var checkboxSection = document.getElementById('checkboxSection');

        // Verificar se a opção selecionada é "Piso Laminado"
        if (selectValue === 'pLaminado') {
            checkboxSection.style.display = 'block';
            } else {
                checkboxSection.style.display = 'none';
            }
        });
</script>
</div>
</body>
</html>

