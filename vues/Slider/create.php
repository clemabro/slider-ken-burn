<?php

?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <center><h1>Création Diaporama</h1></center>
                            <hr/>
                            <form action="" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" require class="form-control" placeholder="Nom Diaporama" value="">
                                </div>
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    Select image to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Upload Image" name="submit">
                                </form>
                            </form>
                            <input type="file" id="imageUploadForm"  name="image" multiple="multiple" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


