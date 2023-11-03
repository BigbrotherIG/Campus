<?php include_once('header.php');

    if(isset($_POST['send'])) {

        $message = $_POST['message'];
        if(empty($message)){
            $error_message = "Message must not be empty";
        }else {
            echo "
                <script>alert('sssssssss') </script>
            ";
        }
    }
?>

    <div class="row">
        <div class="card col-12 grid-margin stretch-card">
            <div class="card-body">
            <form action="" method="post" id="form" class="form-sample ">
                <div class="">
                    <label for="">Message</label>
                    <textarea class="form-control" name="message" id="editor" ></textarea>
                </div>
                
                <div class="mt-2">
                    <input type="submit" class="btn btn-primary" name="send" id="send" value="Send">
                </div>
            </form>
            </div>
        </div>
    </div>

    <script>
        let sendMessage = document.querySelector('#form')
        let editor = document.querySelector('#editor')
        sendMessage.addEventListener('submit', (e) => {
            e.preventDefault;
            console.log(send);
            if(editor.value.length = "") {
                alert(error)
            }
        })
    </script>
<?php include_once('footer.php');?>