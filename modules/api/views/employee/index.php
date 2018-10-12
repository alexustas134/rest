<?php
use yii\widgets\LinkPager;
?>
<div id="xml"></div>
<div class="container  table-responsive" id="table">
	<table class="table table-striped>
		<thead class="thead">
            <tr class="bg-primary">
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Страна</th>
                <th scope="col">Статус</th>
                <th scope="col">Обновлено</th>
                <th scope="col">Инструменты</th>
            </tr>
		</thead>
		<tbody>
		<?php foreach($doc_arr as $val):?>
		<tr>
            <th scope="row" id="ids"><?= $val['id']; ?></th>
			<td><?= $val['name'].'<br>'; ?></td>
			<td><?= $val['email'].'<br>'; ?></td>
			<td><?= $val['country'].'<br>'; ?></td>
			<td><?= $val['status'].'<br>'; ?></td>
			<td><?= $val['modify_at'].'<br>'; ?></td>
            <?php if($val['status'] == 'draft'):?>
			<td>
                <a href="http://rest/api/employee/get-post/<?= $val['id'] ?>" target="_blank">
                    <span class="glyphicon glyphicon-pencil"></span> Редактировать
                </a>
            </td>
            <?php else: ?>
            <td>Опубликовано</td>
            <?php endif;?>
        </tr>
		<?php endforeach; ?>
		</tbody>
	</table><br><br>
	</table><br><br>

    <div class="col-md-12" style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: stretch">
        <input type="submit" value="Создать черновик" id="draft" class="btn btn-outline-primary">
        <input type="submit" id="view-json" value="Просмотр JSON" class="btn btn-outline-success">
    </div><br><br>
	<?php
	// отображаем ссылки на страницы
    echo '<div id="date" style="display: none;">' . date('Y-m-d H:i:s') . '</div>';

	try {
		echo LinkPager::widget([
			'pagination' => $model,
		]);
	} catch (Exception $e) {
	}
	?>

</div>

<script>
$(document).ready(function () {
    var date =  document.getElementById('date');

    $("#draft").click(function (e) {
        //e.preventDefault();

       var d = date.innerText;

        var document = {
            names : {
                name: '',
                email: '',
            },
            country: '',
            status: 'draft',
            date: d
        };
        //console.log(document);
        $.ajax({
            url: '/api/employee/create',
            type: 'POST',
            data: {doc: document},
            success: function (res) {

                //console.log(res);
            },
            error: function () {

                alert('Error!');

            }
        });
    });



    $('#view-json').on('click', function (e) {

        $.ajax({
            url: '/api/employee/index',
            type: 'POST',
            data: {v: 1},
            success: function (res) {
                console.log(res);
                $('#table').css({"display": "none"});
                var result = [];
                for(var i in res){
                    result.push(JSON.stringify(res[i]) + "<br>");
                }
                $('#xml').append(result);
            },
            error: function () {
                alert('Error!');
            }
        });

    });

});
</script>




















