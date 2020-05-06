$(document).ready(function(){
var d = new Date();
var month = new Array();
  month[0] = "Januari";
  month[1] = "Februari";
  month[2] = "Maret";
  month[3] = "April";
  month[4] = "Mei";
  month[5] = "Juni";
  month[6] = "Juli";
  month[7] = "Agustus";
  month[8] = "September";
  month[9] = "Oktober";
  month[10] = "November";
  month[11] = "Desember";
  
$("#date").html(d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear());

     $.ajax({url: "https://api.kawalcorona.com/positif/", success: function(result){
      try {
        var json = result;
        var kasus = result.value;

      $("#positif").html(kasus);
      } catch(e) {
        alert('error');
      }
    }});

      $.ajax({url: "https://api.kawalcorona.com/sembuh/", success: function(result){
      try {
        var json = result;
        var sembuh = result.value;

     $("#sembuh").html(sembuh);
      } catch(e) {
        alert('error');
      }
    }});

      $.ajax({url: "https://api.kawalcorona.com/meninggal/", success: function(result){
      try {
        var json = result;
        var mati = result.value;

     $("#mati").html(mati);
      } catch(e) {
        alert('error');
      }
    }});

     $.ajax({url: "https://api.kawalcorona.com/indonesia/", success: function(result){
     $("#pos").html(result[0].positif);
     $("#sem").html(result[0].sembuh);
     $("#rip").html(result[0].meninggal);
    }});

});