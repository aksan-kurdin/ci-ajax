<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.5.1.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/barang/barang.js') ?>"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
        <h1>DATA BARANG</h1> <br>
        <a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('tambah')">TAMBAH DATA</a> <br>
        <table class="table">
            <thead class="bg-primary">
                <tr>
                    <th>NO</th>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>HARGA</th>
                    <th>STOK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id="target">
            </tbody>
        </table>
        <div class="modal fade" id="form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>DATA BARANG</h1>
                        <center>
                            <font color="red">
                                <p id="pesan"></p>
                            </font>
                        </center>
                    </div>
                    <table class="table">
                        <tr>
                            <td>KODE BARANG</td>
                            <td><input type="text" name="kode_barang" placeholder="Kode Barang" class="form-control"></td>
                            <input type="hidden" name="id" value="">
                        </tr>
                        <tr>
                            <td>NAMA BARANG</td>
                            <td><input type="text" name="nama_barang" placeholder="Nama Barang" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>HARGA</td>
                            <td><input type="text" name="harga" placeholder="harga" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>STOK</td>
                            <td><input type="text" name="stok" placeholder="Stok" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">TAMBAH</button>
                                <button type="button" id="btn-ubah" onclick="ubahdata()" class="btn btn-primary">UBAH</button>
                                <button type="button" data-dismiss="modal" class="btn btn-primary">BATAL</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        ambilData();

        function ambilData() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("index.php/page/ambildata") ?>',
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.length; i++) {
                        baris += '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].kode_barang + '</td>' +
                            '<td>' + data[i].nama_barang + '</td>' +
                            '<td>' + data[i].harga + '</td>' +
                            '<td>' + data[i].stok + '</td>' +
                            '<td><a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit(' + data[i].id + ')">UBAH</a>' +
                            '<a onclick="hapusdata(' + data[i].id + ')" class="btn btn-primary">HAPUS</a></td>' +
                            '</tr>';
                    }
                    $('#target').html(baris);
                }
            })
        }

        function tambahdata() {
            var kode_barang = $("[name='kode_barang']").val();
            var nama_barang = $("[name='nama_barang']").val();
            var harga = $("[name='harga']").val();
            var stok = $("[name='stok']").val();

            $.ajax({
                type: 'POST',
                data: 'kode_barang=' + kode_barang +
                    '&nama_barang=' + nama_barang +
                    '&harga=' + harga +
                    '&stok=' + stok,
                url: '<?php echo base_url("index.php/page/tambahdata") ?>',
                dataType: 'json',
                success: function(hasil) {
                    $("#pesan").html(hasil.pesan);

                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();

                        $("[name='kode_barang']").val('');
                        $("[name='nama_barang']").val('');
                        $("[name='harga']").val('');
                        $("[name='stok']").val('');
                    }
                }
            })
        }

        function submit(x) {
            if (x == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();

                $.ajax({
                    type: 'POST',
                    data: 'id=' + x,
                    url: '<?php echo base_url("index.php/page/ambilId") ?>',
                    dataType: 'json',
                    success: function(hasil) {
                        $('[name="id"]').val(hasil[0].id);
                        $('[name="kode_barang"]').val(hasil[0].kode_barang);
                        $('[name="nama_barang"]').val(hasil[0].nama_barang);
                        $('[name="harga"]').val(hasil[0].harga);
                        $('[name="stok"]').val(hasil[0].stok);
                    }
                })
            }

        }

        function ubahdata() {
            var id = $("[name='id']").val();
            var kode_barang = $("[name='kode_barang']").val();
            var nama_barang = $("[name='nama_barang']").val();
            var harga = $("[name='harga']").val();
            var stok = $("[name='stok']").val();

            $.ajax({
                type: 'POST',
                data: 'id=' + id +
                    '&kode_barang=' + kode_barang +
                    '&nama_barang=' + nama_barang +
                    '&harga=' + harga +
                    '&stok=' + stok,
                url: '<?php echo base_url("index.php/page/ubahdata") ?>',
                dataType: 'json',
                success: function(hasil) {
                    $("#pesan").html(hasil.pesan);

                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();
                    }
                }
            })
        }

        function hapusdata(id) {
            var tanya = confirm('Apakah anda yakin akan menghapus data?');
            if (tanya) {
                $.ajax({
                    type: 'POST',
                    data: 'id=' + id,
                    url: '<?php echo base_url("index.php/page/hapusdata") ?>',
                    success: function() {
                        ambilData();
                    }
                })
            }
        }
    </script>

</body>

</html>