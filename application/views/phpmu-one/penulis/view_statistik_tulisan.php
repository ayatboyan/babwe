<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/plugins/jQuery/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: ''
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        'Ada ' + this.point.y + ' Kali';
                }
            }
        });
    });
</script>

<p class='sidebar-title'><span class='glyphicon glyphicon-list'></span> &nbsp; <?php echo $title; ?>
<div id="container" style="min-width: 310px; height: 403px; margin: 0 auto"></div>
<table id="datatable" style='display:none'>
    <thead>
        <tr>
            <th></th>
            <th>Jumlah Klik / View</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $grafik = $this->model_users->grafik_klik_view();
            foreach ($grafik->result_array() as $row){
                echo "<tr>
                        <th>".tgl_grafik($row['tanggal_view'])."</th>
                        <td>$row[jumlah]</td>
                      </tr>";
            }
        ?>
    </tbody>
</table>


