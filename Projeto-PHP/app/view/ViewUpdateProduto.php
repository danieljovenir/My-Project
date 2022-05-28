<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewUpdateProduto extends ViewPadrao
{
    static function formularioUpdateProduto($aProduto)
    {
        $sHtml = '
        <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Modificador de produtos!</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
      <form action="index.php?pg=produtos&act=update" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="codigo" placeholder="codigo" value="'.$aProduto['codigo'].'" style="display:none">
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="codigo" placeholder="Codigo do produto" value="'.$aProduto['codigo'].'" disabled>
            <label for="floatingInput">Codigo do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="nome" placeholder="Nome do produto" value="'.$aProduto['nome'].'">
            <label for="floatingInput">Nome do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="preco" placeholder="Preço do produto" value="'.$aProduto['preco'].'">
            <label for="floatingInput">Preço do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="precopromocional" placeholder="Preço promocional do produto" value="'.$aProduto['precopromocional'].'">
            <label for="floatingInput">Preço promocional do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="vezes" placeholder="Quantas vezes da pra fazer" value="'.$aProduto['vezes'].'">  
            <label for="floatingInput">Quantas vezes da pra fazer:</label>
          </div>

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Editar Produto</button>
          <small class="text-muted">By product.airsoft</small>
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">- Qualquer problema entre em contato imediatamente com algum dev.. </h2>
         </form>
         </div>
         </div>';
        
        return $sHtml;
    }
}
