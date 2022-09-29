<?php
function post($x)
{
    for ($x = 0; $x <= 6; $x++) {
?>
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="info">
                <div class="name">
                    <p> <img width="10%" style="border-radius: 50%; margin-top: 0%;" height="60px" src="http://localhost/suv/collaction/image/1.jpg" alt="">
                        <b style="font-size: 25px;">Name of Candidate hear <?php print $x; ?></b>
                    </p>
                    <div style="margin-left: 25px;">
                        <h5>Some text heare:</h5>
                        <img width="80%" height="250px" style="margin-top: 0%;" src="http://localhost/suv/collaction/image/1.jpg" alt="">
                        <div class="col-lg-12" style="margin-left: 25px; margin-top: 20px;">
                            <a href="#" class="facebook"><i class="bi bi-like"></i></a>
                            <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="" class=""><i class="bx bxl-twitter"></i></a>
                            <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="">
                                <button class="bg-gray rounded" style="margin-left: 45px; margin-top: 10px; border: navajowhite; color: #000000;">Follow</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
<?php
    }
}
