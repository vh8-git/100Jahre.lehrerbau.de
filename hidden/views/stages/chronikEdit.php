<div id="stage" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
     xmlns="http://www.w3.org/1999/html">
                    <div>
                        <div class="chronikbackgroundEdit">

                            <form action="<?php echo createUrl(['page' => 'chronikedit'])?>" method="post">
                                <div class="formelemente">
                                    <button name="dataMark" class="previouspress cmsbutton cmb30" type="submit" value="7"></button>
                                    <button name="dataMark" class="newpress cmsbutton cmb30" type="submit" value="1"></button>
                                    <button name="dataMark" class="nextpress cmsbutton cmb30" type="submit" value="5"></button>
                                    <button name="dataMark" class="savestoerer cmsbutton cmb100" type="submit" value="3"></button>
                                </div>

                                <?php if ( isset($_SESSION['login']) && $_SESSION['login'] == 1) :
                                    echo '<pre>';
                                    //var_dump($row);
                                    //var_dump($_POST);
                                    //var_dump($_SESSION);
                                    //var_dump($result);
                                    echo '</pre>';
                                endif; ?>
                                <?php foreach ($row as $key => $value) : ?>
                                    <p>
                                        <span><?php echo $key ?>:</span>
                                        <textarea id="<?php echo $key ?>"
                                                  name="<?php echo $key ?>"
                                                        <?php switch($key) {
                                                        case "chronikID": echo 'onfocus="this.blur()"'; break;
                                                        default: ""; break;}?>
                                                        <?php if (strpos($key, 'Text') !== false) {
                                                        echo 'class="text"';}?>><?php echo $value ?></textarea>
                                    </p>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    </div>
                        <p class="stagefooterspace"></p>
                </div>