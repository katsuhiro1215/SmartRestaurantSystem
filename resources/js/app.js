import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";
import fetchJsonp from "fetch-jsonp";

window.Alpine = Alpine;

Alpine.start();

/*******************************
 *  Sweet Alert
 ******************************** */
document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", function (event) {
      if (event.target.id === "delete") {
          event.preventDefault();
          let form = event.target.closest("form");

          Swal.fire({
              title: "本当に宜しいですか？",
              text: "この処理は元に戻すことはできません！",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, delete it!",
          }).then((result) => {
              if (result.isConfirmed) {
                  form.submit();
                  Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
              }
          });
      }
  });
});

/*******************************
 *  Toast
 ******************************** */
document.addEventListener("DOMContentLoaded", function () {
    const toastComponent = document.querySelector(".toast");

    if (toastComponent) {
        setTimeout(() => {
            toastComponent.style.display = "none";
        }, 5000); // 5秒後に非表示にする
    }
});

/*******************************
 *  画像検知
 ******************************** */
document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("image");
    const showImage = document.getElementById("showImage");
    const imageInput2 = document.getElementById("image2");
    const showImage2 = document.getElementById("showImage2");

    if (imageInput) {
        imageInput.addEventListener("change", function (e) {
            const reader = new FileReader();

            reader.onload = function (e) {
                showImage.src = e.target.result;
            };

            reader.readAsDataURL(e.target.files[0]);
        });
    }

    if (imageInput2) {
        imageInput2.addEventListener("change", function (e) {
            const reader = new FileReader();

            reader.onload = function (e) {
                showImage2.src = e.target.result;
            };

            reader.readAsDataURL(e.target.files[0]);
        });
    }
});

/*******************************
 *  郵便番号から住所取得(API)
 ******************************** */
function zipcode() {
    let search = document.getElementById("search");
    if (search) {
        search.addEventListener(
            "click",
            () => {
                let api = "https://zipcloud.ibsnet.co.jp/api/search?zipcode=";
                let error = document.getElementById("error");
                let input = document.getElementById("zipcode");
                let address1 = document.getElementById("address1");
                let address2 = document.getElementById("address2");
                let address3 = document.getElementById("address3");
                let param = input.value.replace("-", ""); //入力された郵便番号から「-」を削除
                let url = api + param;

                fetchJsonp(url, {
                    timeout: 10000, //タイムアウト時間
                })
                    .then((response) => {
                        error.textContent = ""; //HTML側のエラーメッセージ初期化
                        return response.json();
                    })
                    .then((data) => {
                        if (data.status === 400) {
                            //エラー時
                            error.textContent = data.message;
                        } else if (data.results === null) {
                            error.textContent =
                                "郵便番号から住所が見つかりませんでした。";
                        } else {
                            address1.value = data.results[0].address1;
                            address2.value = data.results[0].address2;
                            address3.value = data.results[0].address3;
                        }
                    })
                    .catch((ex) => {
                        //例外処理
                        console.log(ex);
                    });
            },
            false
        );
    }
}
zipcode();
