<?php
    session_start();
    
    if (isset($_POST['lletres'])) {
        $_SESSION['lletres'] = $_POST['lletres'];
    }

    if (isset($_SESSION['data']) && $_SESSION['data'] !== date('Y-m-d')) {
        $_SESSION['lletres'] = [];
        echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    const tecles = document.querySelectorAll(".lletra-teclat");
                    tecles.forEach(function(tecla) {
                        tecla.classList.remove("teclat-no");
                        tecla.classList.remove("teclat-si");
                        tecla.classList.remove("teclat-lloc");
                    });
                });
             </script>';  
        $_SESSION['data'] = date('Y-m-d');
    }
  
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title>PHPMOT | El wordle en català.</title>
    <link href="style.css" rel="stylesheet">
</head>
<body style="--vh: 750px;">

<div id="root">
    <main class="flex flex-col justify-between">
        <header id="header" class="flex items-center h-16 space-x-3 px-3 border-b border-gray-300">
            <h1 class="dark:text-white"> PHPMOT </h1>
        </header>
        <div class="py-6">
            <div class="flex justify-center mb-1">
                <?php
                    if (isset($_SESSION['lletres'][0])) {
                        $lletres = $_SESSION['lletres'][0];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            </div>
            <div class="flex justify-center mb-1">
                <?php
                    if (isset($_SESSION['lletres'][1])) {
                        $lletres = $_SESSION['lletres'][1];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            </div>
            <div class="flex justify-center mb-1">
            <?php
                    if (isset($_SESSION['lletres'][2])) {
                        $lletres = $_SESSION['lletres'][2];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            
            </div>
            <div class="flex justify-center mb-1">
            <?php
                    if (isset($_SESSION['lletres'][3])) {
                        $lletres = $_SESSION['lletres'][3];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            
            </div>
            <div class="flex justify-center mb-1">
                    <?php
                    if (isset($_SESSION['lletres'][4])) {
                        $lletres = $_SESSION['lletres'][4];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            </div>
            <div class="flex justify-center mb-1">
            <?php
                    if (isset($_SESSION['lletres'][5])) {
                        $lletres = $_SESSION['lletres'][5];
                        $paraula_avui = $_SESSION['paraula_secreta'];

                        for ($i = 0; $i < strlen($lletres); $i++){
                            if ($lletres[$i] == $paraula_avui[$i]) {
                                echo '<div class="lletra-taula taula-lloc"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                            if (tecla) {
                                                tecla.classList.add("teclat-lloc");
                                            }
                                        });
                                    </script>';

                            }elseif (strpos($paraula_avui, $lletres[$i])){
                                echo '<div class="lletra-taula taula-si"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-si");
                                        }
                                    });
                                </script>';
                            } else {
                                echo '<div class="lletra-taula taula-no"><div class="letter-container">' . $lletres[$i] . '</div></div>';
                                echo '<script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const tecla = document.querySelector(".lletra-teclat[data-lletra=\'' . $lletres[$i] . '\']");
                                        if (tecla) {
                                            tecla.classList.add("teclat-no");
                                        }
                                    });
                                </script>';
                            }

                        }
                    } else {
                        echo '<div class="flex justify-center mb-1">';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '<div class="lletra-taula taula-enblanc"><div class="letter-container"></div></div>';
                        echo '</div>';
                    }
                    ?>
            </div>
        </div>
        <div class="flex justify-center mb-1">
            <?php

                if (isset($_SESSION['error'])) {
                    echo '<p class="error">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }

                if (isset($_SESSION['resultat'])) {
                    echo '<p class="resultat">' . $_SESSION['resultat'] . '</p>';
                    unset($_SESSION['resultat']);
                }
            ?>
        </div>

        <div id="teclat">
            <div class="flex justify-center mb-1">
                <button class="lletra-teclat" data-lletra="Q">Q</button>
                <button class="lletra-teclat" data-lletra="W">W</button>
                <button class="lletra-teclat" data-lletra="E">E</button>
                <button class="lletra-teclat" data-lletra="R">R</button>
                <button class="lletra-teclat" data-lletra="T">T</button>
                <button class="lletra-teclat" data-lletra="Y">Y</button>
                <button class="lletra-teclat" data-lletra="U">U</button>
                <button class="lletra-teclat" data-lletra="I">I</button>
                <button class="lletra-teclat" data-lletra="O">O</button>
                <button class="lletra-teclat" data-lletra="P">P</button>
            </div>
            <div class="flex justify-center mb-1">
                <button class="lletra-teclat" data-lletra="A">A</button>
                <button class="lletra-teclat" data-lletra="S">S</button>
                <button class="lletra-teclat" data-lletra="D">D</button>
                <button class="lletra-teclat" data-lletra="F">F</button>
                <button class="lletra-teclat" data-lletra="G">G</button>
                <button class="lletra-teclat" data-lletra="H">H</button>
                <button class="lletra-teclat" data-lletra="J">J</button>
                <button class="lletra-teclat" data-lletra="K">K</button>
                <button class="lletra-teclat" data-lletra="L">L</button>
                <button class="lletra-teclat" data-lletra="Ç">Ç</button>
            </div>
            <div class="flex justify-center">
                <button class="lletra-teclat teclat-enviar"> Enviar
                </button>
                <button class="lletra-teclat" data-lletra="Z">Z</button>
                <button class="lletra-teclat" data-lletra="X">X</button>
                <button class="lletra-teclat" data-lletra="C">C</button>
                <button class="lletra-teclat" data-lletra="V">V</button>
                <button class="lletra-teclat" data-lletra="B">B</button>
                <button class="lletra-teclat" data-lletra="N">N</button>
                <button class="lletra-teclat" data-lletra="M">M</button>
                <button class="lletra-teclat teclat-suprimir" aria-label="Suprimir">
                    <svg viewBox="0 0 24 24" role="presentation" class="dark:text-white h-6">
                        <path d="M22,3H7C6.31,3 5.77,3.35 5.41,3.88L0,12L5.41,20.11C5.77,20.64 6.31,21 7,21H22A2,2 0 0,0 24,19V5A2,2 0 0,0 22,3M19,15.59L17.59,17L14,13.41L10.41,17L9,15.59L12.59,12L9,8.41L10.41,7L14,10.59L17.59,7L19,8.41L15.41,12"
                              style="fill: currentcolor;"></path>
                    </svg>
                </button>
            </div>
        </div>
    </main>

    <form id="form" action="processa.php" method="POST">
        <input type="hidden" name="lletres" id="lletres">
    </form>

    <script>

        function enviarLletra(element) {
            const caselles_lliures = document.getElementsByClassName("taula-enblanc");

            for (let i = 0; i < caselles_lliures.length && i < 5; i++) {
                if (!caselles_lliures[i].hasAttribute("data-ocupat")) {
                    caselles_lliures[i].getElementsByClassName("letter-container")[0].innerHTML = element;
                    caselles_lliures[i].setAttribute("data-ocupat", "true");
                    break;
                }
            }
        }

        function esborrarLLetra() {
            const caselles_lliures = document.getElementsByClassName("taula-enblanc");

            for (let i = caselles_lliures.length - 1; i >= 0; i--) {
                if (caselles_lliures[i].hasAttribute("data-ocupat")) {
                    caselles_lliures[i].getElementsByClassName("letter-container")[0].innerHTML = "";
                    caselles_lliures[i].removeAttribute("data-ocupat");
                    break;
                }
            }
        }

        function enviarFormulari() {
            let lletres = "";
            const caselles_lliures = document.getElementsByClassName("taula-enblanc");
            for (let i = 0; i < caselles_lliures.length && i < 5; i++) {
                if (caselles_lliures[i].hasAttribute("data-ocupat")) {
                    lletres += caselles_lliures[i].getElementsByClassName("letter-container")[0].innerHTML;
                }
            }
            document.getElementById("lletres").value = lletres;
            document.getElementById("form").method="post";
            document.getElementById("form").submit();
        }

        window.onload = () => {
            const tecles = document.getElementsByClassName("lletra-teclat");

            for (let i = 0; i < tecles.length; i++) {
                tecles[i].onclick = () => {
                    if (tecles[i].classList.contains("teclat-enviar"))
                        enviarFormulari();
                    else if (tecles[i].classList.contains("teclat-suprimir"))
                        esborrarLLetra();
                    else
                        enviarLletra(tecles[i].innerHTML);
                }
            }
        }

    </script>
</div>
</body>
</html>