s<section id="stage">
    <div class="font normal">
        <div id="chronik" class="chronik">
            <h3 class="marg">Chronik</h3>
            <p class="marg">Übersicht aller Datensätze für die Chronik der WEBsite "100Jahre Lehrerbau"</p>
            <div class="spalte">
                <div class="marg pressemitteilung">
                    <?php if ( isset($_SESSION['login'])): ?><span class="btnEditchronik btnEdit glyphicon glyphicon-pencil"></span><?php endif; ?>
                    <?php foreach ($chronik as $pm) { ?>
                        <p>
                            <a target= "_blank" href="/chronikrelease/#<?php echo $pm['ID']?>"><span class="ChronikDate"><?php $date=date_create($pm['Datum']); echo date_format($date,"d.m.Y");?></span><span class="titelChronik"><?php echo $pm['Headline']?></span></a>
                        </p>
                    <?php } ?>
                    <p>
                        <a target="_blank" href="/archivpress"><span class="ChronikDate"></span><span class="titelChronik">… Archiv der Pressemitteilungen</span></a>
                    </p>
                </div>
            </div>
            <p class="stagefooterspace"></p>
        </div>
</section>