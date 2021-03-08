<?php ?>

<h2>
    Semana <?=$semanaActualAnteriorSiguiente?>
    <span class="acciones">
        <a href="semana?semana=<?=($semana->numSemana)-1?>"><i class="gg-arrow-left icono"></i>&nbsp;Ant.</a>
        <a href="semana?semana=<?=($semana->numSemana)+1?>">&nbsp;Sig.<i class="gg-arrow-right icono"></i></a>
    </span>
</h2>

<?php if($semana): ?>
    <div class="semana">
        <?php foreach( $semana->dias as $dia ): ?>
            <div class="semana__dia<?=($dia->esFinde || $dia->esFestivo ? ' findeofestivo' : '')?>">
                <div class="semana__dia-header">
                    <div class="semana__dia-header__diasemana"><?=FechaUtils::obtenerDiaSemanaTextual( $dia->fechaDt )?></div>
                    <div><?=FechaUtils::obtenerFechaFormateada_es( $dia->fechaDt )?></div>
                </div>
                <div class="semana__dia-dia">
                    <div class="semana__dia-dia__mediodia">
                        <div style="color: var(--azul-oscuro);">
                            Comida:
                        </div>
                        <div>
                            <?= $dia->comidaMediodia->descripcion ?>
                        </div>
                    </div>    
                    <div class="semana__dia-dia__cena">
                        <div style="color: var(--azul-oscuro);">
                            Cena:
                        </div>
                        <div>
                            <?= $dia->comidaCena->descripcion ?>
                        </div>
                    </div>    
                </div>
                <div class="semana__dia-footer">
                    <a href="">Modificar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="info">La semana todavía no ha sido generada. ¿Quieres generarla?</div>
    <form class="form-solo-boton" action="semana/generar" method="post">
        <input type="hidden" name="semana" value="<?=$numSemana?>">
        <button type="submit" class="btn azul">Generar</button>
    </form>
<?php endif; ?>