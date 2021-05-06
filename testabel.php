<!DOCTYPE html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        tr.hide-table-padding td {
            padding: 0;
        }

        .expand-button {
            position: relative;
        }

        .accordion-toggle .expand-button:after {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translate(0, -50%);
            content: '-';
        }

        .accordion-toggle.collapsed .expand-button:after {
            content: '+';
        }
    </style>
</head>

<body>


    <div class="container my-4">


        <p>
            Detailed documentation and more examples you can find in our
            <a href="https://mdbootstrap.com/docs/standard/data/tables/" target="_blank"><strong>Tables Docs</strong></a>.
        </p>

        <hr class="mt-5">

        <p>Built with <a target="_blank" href="https://mdbootstrap.com/docs/standard/">Material Design for Bootstrap</a> - free and powerful Bootstrap UI KIT</p>

        <a class="btn btn-primary me-2" href="https://mdbootstrap.com/docs/standard/getting-started/installation/" target="_blank" role="button">Download MDB UI KIT<i class="fas fa-download ms-2"></i></a>
        <a class="btn btn-danger me-2" target="_blank" href="https://mdbootstrap.com/docs/standard/" role="button">Learn more</a>
        <a class="btn btn-success me-2" target="_blank" href="https://mdbootstrap.com/docs/standard/getting-started/" role="button">Tutorials</a>
        <a class="btn btn-dark me-2" target="_blank" href="https://github.com/mdbootstrap/mdb-ui-kit" role="button">GitHub<i class="fab fa-github ms-2"></i></a>


        <hr class="mt-5">

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Heading</th>
                        <th scope="col">Heading</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="accordion-toggle collapsed" id="accordion1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                        <td class="expand-button"></td>
                        <td>Hapus</td>
                        <td>Cell</td>
                        <td>Cell</td>

                    </tr>
                    <tr class="hide-table-padding">
                        <td></td>
                        <td colspan="3">
                            <div id="collapseOne" class="collapse in p-3">
                                <div class="row">
                                    <div class="col-2">Nama Lama :</div>
                                    <div class="col-6">Kursi</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">Nama Baru :</div>
                                    <div class="col-6">Meja</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value 3</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value 4</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="accordion-toggle collapsed" id="accordion2" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                        <td class="expand-button"></td>
                        <td>Cell</td>
                        <td>Cell</td>
                        <td>Cell</td>

                    </tr>
                    <tr class="hide-table-padding">
                        <td></td>
                        <td colspan="4">
                            <div id="collapseTwo" class="collapse in p-3">
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value</div>
                                </div>
                                <div class="row">
                                    <div class="col-2">label</div>
                                    <div class="col-6">value</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>




</body>

</html>