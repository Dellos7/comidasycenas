function borrarComida(e, codigo){
    e.preventDefault();
    if( confirm( '¿Quieres borrar la comida?' ) ){        
        const req = new XMLHttpRequest();
        req.open( 'DELETE', `api/comida/borrar?codigo=${codigo}` );
        req.onreadystatechange = function(){
            if( req.status === 200 && req.readyState === req.DONE ){
                const res = JSON.parse( req.response );
                if( !res || res.error ){
                    alert( 'Error borrando la comida' );
                } else{
                    document.querySelectorAll( `[data-comida-codigo="${codigo}"]` ).forEach( (el) => {
                        el.remove();
                    });
                }
            }
        };
        req.send();
    }
}