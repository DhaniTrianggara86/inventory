    <div style="margin-top:45px" class="panel panel-default">
        <div class="panel-body">
            <p style="margin-bottom:5px;font-size:17px;border-bottom:2px solid #eee;padding-bottom:5px">Kategori Produk</p>

        <?php  
        $query = mysqli_query($mysqli, "SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")
                            or die('Ada kesalahan pada query tampil data kategori : '.mysqli_error($mysqli));

        while($data = mysqli_fetch_assoc($query)) {
        ?>
            <div class="media">
                <div class="media-body">
                    <i class="fa fa-angle-double-right"></i>
                    <a class="media-heading" href="?page=kategori&kategori=<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></a>
                </div>
            </div>
            <div style="border-bottom:1px dotted #eee;padding-bottom:5px"></div>
        <?php
        }
        ?>
        </div>
    </div>

    