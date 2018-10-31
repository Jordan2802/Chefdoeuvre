<?php
session_start();
$login =$_SESSION['pseudo'];
if(!$login){
    header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>Accueil</title>
</head>

<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>

    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="http://placehold.it/350x150" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://placehold.it/350x150" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://placehold.it/350x150" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://placehold.it/350x150" alt="Fourth slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container col-md-10">
            <div class="bloc left col-md-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab voluptates
                labore
                laborum, molestias hic cum harum nostrum fuga culpa repellat praesentium voluptatem corporis quae illo
                tempora recusandae. Dolorem, itaque ea numquam reiciendis, perspiciatis impedit dolorum aliquid soluta
                ipsam sunt quidem molestiae dolores veniam adipisci id velit. Officia id, odit necessitatibus
                repudiandae enim quos doloremque quidem ratione inventore laboriosam molestias repellat perspiciatis
                cum quis minima harum. Rem dolor, ducimus, animi amet inventore, obcaecati fuga eveniet quibusdam
                consequuntur nobis molestiae odio. Earum saepe porro placeat vel rerum magni consectetur dolore sunt
                ipsam deserunt doloribus, ipsum velit eos doloremque aspernatur ex accusantium facere accusamus
                possimus hic illum tenetur iusto distinctio. Repudiandae dolor repellendus, ducimus fugiat autem
                nesciunt dicta cum inventore aliquam, impedit voluptate error minus? Repudiandae nulla neque quia ullam
                in excepturi laudantium ipsa veniam quis explicabo voluptatem itaque, laborum quaerat aliquam dolore
                maiores unde officiis autem sunt distinctio eaque nesciunt inventore. Est labore voluptatum inventore
                qui temporibus aliquid exercitationem reprehenderit autem, dolorum voluptatem hic tenetur. Quidem
                alias, quas ipsa possimus explicabo mollitia at dolorum voluptate nulla iusto animi omnis assumenda
                repellendus laborum accusantium adipisci harum deserunt neque optio dolor voluptatibus. Aliquam
                sapiente molestias, commodi quae ducimus necessitatibus molestiae provident beatae blanditiis dolores
                modi minus! Eaque quod ullam tempora omnis eveniet, unde enim laudantium obcaecati! Sapiente porro
                facilis dicta in corporis, doloremque quae, quam incidunt, alias aliquid facere dolor maiores
                voluptatem officiis delectus consequuntur ipsa deleniti provident dignissimos. Accusamus aliquid nemo
                odio numquam nihil, corrupti porro. Minus, id necessitatibus illum laboriosam corporis, perspiciatis
                quidem, provident nisi non cumque animi? Modi aspernatur dolorem enim voluptatibus doloribus assumenda
                ea laudantium itaque consectetur similique, necessitatibus amet id a molestiae sed. Corrupti vero
                aliquam numquam provident reprehenderit voluptates quod sit, blanditiis, nam est, quam fuga tempore!
                Harum vero quibusdam reprehenderit, non tempore ipsam odit quo facere molestiae maxime dolorem, quod
                sunt, nemo eaque. Vitae quibusdam cum magnam asperiores obcaecati quisquam, ipsam quia aperiam, vel
                voluptatibus cumque natus minus praesentium in veritatis? Eligendi cumque nam sunt omnis, ab doloribus
                ullam delectus vel aspernatur corporis minima tempore saepe dicta perferendis illum dolorum rem enim
                provident sed sapiente? Voluptatibus, ipsam!</div>
            <div class="bloc right col-md-4">
                <div class="row">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod autem laborum architecto
                    earum impedit, accusamus soluta? Esse, dignissimos voluptatum. Quasi consectetur soluta similique
                    totam ab cum voluptates modi rerum, dolorum culpa minima vero laudantium repellendus explicabo rem
                    provident esse nam corporis praesentium nisi. Corporis consequuntur omnis sapiente perspiciatis
                    modi illum!</div>
                <div class="row">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, quasi aliquid.
                    Consectetur aspernatur ex dolorum quam atque, reprehenderit enim odio eaque dicta pariatur iste
                    dolore voluptatibus, officia, eveniet facilis! Commodi, non nostrum cupiditate recusandae facilis
                    vel ea libero nemo distinctio animi odio veritatis facere neque natus eius aperiam nesciunt ipsam?</div>
            
                <div class="row">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde ut repellat nulla
                    aspernatur, temporibus dignissimos deserunt itaque accusamus quidem ducimus incidunt perspiciatis
                    ea necessitatibus minima laudantium corrupti ab, nam, saepe consequuntur? Delectus blanditiis
                    explicabo architecto voluptates saepe veritatis neque totam maxime quia illo voluptatibus in,
                    impedit excepturi placeat doloribus aliquid.</div>
            </div>
        </div>





    </main>

    <footer class="d-flex justify-content-around border-top ">
    <?php include('../include/footer.php'); ?>
    </footer>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>