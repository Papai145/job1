$(document).ready(function () {
  /*обновление таблиц с поездками */
  $("#but1").bind("click", function () {
    $(".table tbody").empty();
    $.get(
      "table.php",
      {
        name: $("select[name = 'name']").val(),
        city: $("select[name = 'city']").val(),
      },
      function (data) {
        let arr = JSON.parse(data);
        for (let i of arr) {
          $(".table tbody").append("<tr></tr>");
          $(".table tbody").append(
            "<td class = 'delete  idtravel id_" +
              i["id"] +
              " '>" +
              i["id"] +
              "</td>" //id
          );
          $(".table tbody").append(
            "<td class = 'fio id_" + i["id"] + " '>" + i["fio"] + "</td>" //fio
          );
          $(".table tbody").append(
            "<td class = 'city " + i["id"] + " '>" + i["city"] + "</td>" //city
          );
          $(".table tbody").append(
            "<td class = 'update date edit id_" +
              i["id"] +
              " '>" +
              i["date_of_departure"] +
              "</td>" //дата начал пути
          );
          $(".table tbody").append("<td>" + i["arrival_date"] + "</td>"); //день прибытия в пункт назначения
          $(".table tbody").append("<td>" + i["return_date"] + "</td>"); //день прибытия в мск
          $(".table tbody").append(
            '<td><input type="button" class="change ' +
              i["id"] +
              ' btn btn-primary" value=редактировать></td>'
          );
          $(".table tbody").append(
            '<td><input disabled type="button" class="updateBut ' +
              i["id"] +
              ' btn btn-primary" value="обновить" id="update"></td>'
          );
          $(".table tbody").append(
            "<td><input type='button' class='delete " +
              i["id"] +
              " btn btn-danger' value='удалить' ></td>"
          );
        }
        //редактирование даты выезда
        $(".change").on("click", function change(e) {
          let id = e.target.classList[1];
          let obj = $(".edit.id_" + id);
          for (let i of obj) {
            let input = document.createElement("input");
            let a = i.innerHTML;
            input.value = i.innerHTML;
            i.innerHTML = "";
            i.appendChild(input);
            $(input).bind("blur", function () {
              i.innerHTML = this.value;
              $(".change").on("click", change);
              $(".updateBut." + id).removeAttr("disabled");
            });
          }
          $(".change").off("click", change);
        });
        //обновление данных
        $(".updateBut").on("click", function update(e) {
          let id = e.target.classList[1];
          let idTravel = $(".idtravel.id_" + id).text();
          let dateOfDeparture = $(".date.id_" + id).text();
          let fio = $(".fio.id_" + id).text();
          let city = $(".city." + id).text();

          $.get(
            "update.php",
            {
              idTravel: idTravel,
              dateOfDeparture: dateOfDeparture,
              city: city,
              fio: fio,
            },
            function (data) {
              $("#result").empty().html(data);
            }
          );
          $(".updateBut." + id).attr("disabled", true);
        });
        $(".delete").on("click", function update(e) {
          let id = e.target.classList[1];
          let answer = confirm("Вы точно хотите удалить поездку №" + id);
          if (answer) {
            $.get(
              "delete.php",
              {
                id: id,
              },
              function (data) {
                $("#result").empty().css("color", "green").append(data);
              }
            );
          }
        });
      }
    );
  });
  /*заполнение селекта именами */
  $.get("choiseFio.php", {}, function (data) {
    let arr = JSON.parse(data);
    for (let id in arr) {
      $("select[name = 'fio']").append(
        $("<option value = '" + arr[id] + "'>" + arr[id] + "</option>")
      );
      $("select[name = 'name']").append(
        $("<option value = '" + arr[id] + "'>" + arr[id] + "</option>")
      );
    }
  });

  /*заполнение селекта городами */
  $.get("choiseCity.php", {}, function (data) {
    let arr = JSON.parse(data);
    for (let id in arr) {
      $("select[name = 'region']").append(
        $("<option value = '" + arr[id] + "'>" + arr[id] + "</option>")
      );
      $("select[name = 'city']").append(
        $("<option value = '" + arr[id] + "'>" + arr[id] + "</option>")
      );
    }
  });
  /*время прибытия*/
  $("#date_of_daperture").bind("blur", function () {
    let dataCheck = $("#date_of_daperture").val();
    let data1 = new Date($("#date_of_daperture").val());
    let second = Date.parse(data1) / 1000;
    let city = $("select[name = 'region']").val();
    $.get(
      "data.php",
      {
        data: second,
        city: city,
      },
      function (data) {
        $("#div").text(data);
      }
    );
  });
  /*внесение расписания а бд */
  $("#but").bind("click", function () {
    let fio = $("select[name = 'fio']").val();
    let city = $("select[name = 'region']").val();
    let secondDeparture = $("#date_of_daperture").val();
    let arrivalDate = $("#div").html();
    if (secondDeparture) {
      $.get(
        "makingTrip.php",
        {
          fio: fio,
          city: city,
          secondDeparture: secondDeparture,
          arrivalDate: arrivalDate,
        },
        function (data) {
          $("#result").empty().append(data);
        }
      );
    } else {
      $("#result").css("color", "red").text("введите дату убытия");
    }
  });
});
