<div class="page-header">
    <h1>Histórico</h1>
</div>

<table class="table table-striped">
    <thead>
        <th>Data da Novidade</th>
        <th>Texto da Novidade</th>
    </thead>
    <tbody>
        <?php
        if (count($listaNovidades) === 0 ){
            echo "Não existe nenhuma novidade cadastrada.";
        }   else {
        foreach($listaNovidades as $novidade) {?>
            <tr>
                <td><?php echo $novidade->data_novidade ?></td>
                <td><?php echo $novidade->texto ?></td>
            </tr>
        <?php }}?>
    </tbody>
</table>