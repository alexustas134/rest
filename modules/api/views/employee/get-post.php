
<!--<script src="http://code.jquery.com/jquery-2.2.4.js"></script>-->

<form action="/api/employee/update" method="post" id="form"><br><br>

	<div class="col-md-6" style="text-align: center;">
        <label for="ids">ID</label><br>
        <input type="text" id="ids" value="<?= $gp['id']?>"><br><br>
        <label for="ids">Имя</label><br>
        <input type="text" id="name" value="<?= $gp['name']?>"><br><br>
    </div>

	<div class="col-md-6" style="text-align: center;">
        <label for="email">E-mail</label><br>
        <input type="text" id="email" value="<?= $gp['email']?>"><br><br>
        <label for="country">Страна</label><br>
        <input type="text" id="country" value="<?= $gp['country']?>"><br><br>
    </div>

    <div class="col-md-12" style="display: flex; flex-flow: row wrap; justify-content: space-around; align-items: stretch">
        <input type="submit" id="edit" value="Редактировать" class="btn btn-outline-primary">
        <input type="submit" id="publish" value="Опубликовать" class="btn btn-outline-success">
    </div>
</form>


<script>
    $(document).ready(function () {

        /*Click on button for editing */
        $('#edit').on('click', function (e) {
            e.preventDefault();

        /*Prepare data for object */
            var el_id = document.getElementById('ids').value,
                nm = document.getElementById('name').value,
                mail = document.getElementById('email').value,
                cnt = document.getElementById('country').value;

        /*Editing created JSON object*/
            var docs = {
                id: el_id,
                nam: {
                    name: nm,
                    email: mail,
                },
                country: cnt,
                status: 'draft',

            };

        /*Send Ajax object to Server   */
            $.ajax({
                url: '/api/employee/update?id='+ el_id,
                type: 'PATCH',
                data: {doc: docs},
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('Error!');

                }
            });
        });

        /*Click on button for publish*/
        $('#publish').on('click', function (e) {
            e.preventDefault();

        /*Prepare data for object */
            var el_id = document.getElementById('ids').value,
                nm = document.getElementById('name').value,
                mail = document.getElementById('email').value,
                cnt = document.getElementById('country').value;

        /*Publish created JSON object*/
            var doc_pub = {
                id: el_id,
                nam: {
                    name: nm,
                    email: mail,
                },
                country: cnt,
                status: 'published',

            };

        /*Send Ajax object to Server */
            $.ajax({
                url: '/api/employee/update?id='+ el_id,
                type: 'POST',
                data: {docs_pub: doc_pub},
                success: function (res) {
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            });
        });

    });

</script>