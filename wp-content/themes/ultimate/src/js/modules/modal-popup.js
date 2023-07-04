export function modalPopup() {
    window.onload = function () {
        var myID = document.getElementById("modal");

        if (myID) {
            var myScrollFunc = function () {
                var y = window.scrollY;
                if (y >= 100) {
                    myID.className = "popup-modal show";
                } else {
                    myID.className = "popup-modal hide";
                }
            };

            window.addEventListener("scroll", myScrollFunc);
            if (sessionStorage.getItem("modal") === "none") {
                document.getElementById("modal").style.display = "none";
            }
            document.getElementById("close").onclick = function () {
                document.getElementById("modal").style.display = "none";
                sessionStorage.setItem("modal", "none");
            };
        }
    };

    //Show code after form entered
    document.addEventListener(
        "wpcf7mailsent",
        function (event) {
            if ("1431" == event.detail.contactFormId) {
                // if you want to identify the form
                var hid = document.getElementsByClassName("coupon-div");
                // Emulates jQuery $(element).is(':hidden');
                if (hid[0].offsetWidth > 0 && hid[0].offsetHeight > 0) {
                    hid[0].style.visibility = "visible";
                }
            }
        },
        true
    );

    //Copy to clipboard

    const modalItem = document.getElementById("copy-content");

    if (modalItem) {
        document
            .getElementById("copy-content")
            .addEventListener("click", function () {
                let text = document.getElementById("code").innerHTML;
                const element = document.getElementById("copy-content");

                const copyContent = async () => {
                    try {
                        await navigator.clipboard.writeText(text);
                        console.log("Content copied to clipboard");

                        element.classList.add("success");
                    } catch (err) {
                        console.error("Failed to copy: ", err);
                        element.classList.add("fail");
                    }
                };

                copyContent();
            });
    }
}