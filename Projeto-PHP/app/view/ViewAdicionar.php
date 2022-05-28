<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewAdicionar extends ViewPadrao
{
    static function formularioProduto()
    {
        $sHtml = '
        <div class="modal-content rounded-4 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Repositório de produtos!</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
      <form action="index.php?pg=produtos&act=insert" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="nome" id="floatingInput" placeholder="Ex: Airsoft Spring Vigor Scar L">
            <label for="floatingInput">Nome do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="preco" id="floatingInput" placeholder="Ex: 1.200,00">
            <label for="floatingInput">Preço do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="precopromocional" id="floatingInput" placeholder="Ex: 1.400,00">
            <label for="floatingInput">Preço promocional do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" name="vezes" id="floatingInput" placeholder="Ex: 24x">
            <label for="floatingInput">Vezes que será possível fazer:</label>
          </div>

          <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Enviar Produto</button>
          <small class="text-muted">By product.airsoft</small>
          <hr class="my-4">
          <h2 class="fs-5 fw-bold mb-3">- Qualquer problema entre em contato imediatamente com algum dev.. </h2>
        </form>
      </div>
    </div>';
        
        return $sHtml;
    }
}
