<h3 class="to-center">Создание объявления:</h3>
<div class="profile-container">
    <form method="post" action="../ad/creationAd.php" enctype="multipart/form-data">
        <input class="profile-input" type="text" name="title" placeholder="Название объявления">
        <textarea class="profile-input" style="min-height: 150px" type="text" name="information" placeholder="Описание"></textarea>

        <input style="opacity: 0; position: absolute" id="input__file" type="file" name="filename" value="Изображение">
        <label for="input__file" class="profile-input__file-button">
            <span class="input__file-icon-wrapper">
                <img class="input__file-icon" src="../img/input-file.svg" alt="Выбрать файл" height="35">
            </span>
            <span class="profile-input__file-button-text">Выберите изображение</span>
        </label>

        <!-- Сколько файлов выбрано: -->
        <script>
            let inputs = document.querySelectorAll('#input__file');
            Array.prototype.forEach.call(inputs, function (input) {
                let label = input.nextElementSibling,
                    labelVal = label.querySelector('.profile-input__file-button-text').innerText;

                input.addEventListener('change', function (e) {
                    let countFiles = '';
                    if (this.files && this.files.length >= 1)
                        countFiles = this.files.length;

                    if (countFiles)
                        label.querySelector('.profile-input__file-button-text').innerText = 'Выбрано файлов: ' + countFiles;
                    else
                        label.querySelector('.profile-input__file-button-text').innerText = labelVal;
                });
            });
        </script>

        <input class="profile-input" type="price" name="price" placeholder="Цена">
        <input class="input-btn center" type="submit" value="Создать">
    </form>

    <?php require "msg.php"?>

</div>

