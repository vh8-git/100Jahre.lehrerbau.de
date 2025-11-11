

                <div id="stage">
                    <div class="font normal">
                        <div id="archiv" class="first chronik">
                            <h3 class="marg"><a class="linklast" href="/press">Archiv der Pressemitteilungen</a></h3>
                            <p class="marg">Hier finden Sie alle Pressemitteilungen der laufenden Legislatur.</p>
                            <div>
                                <div class="marg">
                                    <?php if ( isset($_SESSION['login'])): ?><span class="btnEditPress btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                                    <h2>Pressemitteilungen der FDP-Fraktion<a class="link" href="/pressrelease">MEHR…</a></h2>
                                    <?php foreach ($chronik as $pm) { ?>
                                        <p>
                                            <a target= "_blank" href="/pressrelease/#<?php echo $pm['PDFlink']?>"><span class="ChronikDate"><?php $date=date_create($pm['Datum']); echo date_format($date,"d.m.Y");?></span><span class="titelChronik"><?php echo $pm['Titel']?></span></a>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <p class="stagefooterspace"></p>
                        </div>
                    </div>
                </div>



<!--

-->