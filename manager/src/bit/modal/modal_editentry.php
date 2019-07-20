<?php

echo "<div class='modal' id='edmodal'>
    <div class='modal-background'></div>
    <div class='modal-card'>
        <header class='modal-card-head'>
            <p class='modal-card-title'>Editar ocorrência #<span id='m_edit_number'>#</span></p>
            <button id='cemodal' onclick='removeModal(`cemodal`, `edmodal`);' class='modal-close is-large' aria-label='close'></button>
        </header>
        <section class='modal-card-body'>
            <form id='edit_entryForm' action='' method='POST'>
                <div class='field has-addons'>
                    <div class='field-body'>
                        <!-- style='width: 10% !important;' -->
                        <div class='field has-addons'>
                            <div class='control'>
                                <label class='label' style='margin-left: 20%;'>ID</label>
                                <a id='edit_entryid' class='button'>#</a>
                            </div>
                            <div class='control'>
                                <label class='label'>Empresa</label>
                                <input id='edit_companyName' type='text' class='input' disabled>
                            </div>
                        </div>
                        <div class='field'>
                            <p class='control'>
                                <label class='label'>Data</label>
                                <input id='edit_entryDate' type='text' value='' class='input' disabled>
                            </p>
                        </div>
                        <div class='field'>
                            <div class='control'>
                                <label class='label'>Status</label>
                                <div class='select'>
                                    <select id='edit_entryStatus' name='edit_entryStatus'>
                                        <option value='0'>Finalizada</option>
                                        <option value='1'>Pendente</option>
                                        <option value='2'>Urgente</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='field'>
                    <label class='label'>Problema</label>
                    <div class='control'>
                        <textarea id='edit_entryProblem' name='edit_entryProblem' class='textarea'></textarea>
                    </div>
                </div>
                <footer class='modal-card-foot'>
                    <button class='button is-warning is-fullwidth is-focused' id='edit_entrySubmit'>
                        <span class='icon is-small'>
                          <i class='fas fa-check'></i>
                        </span>
                    </button>
                </footer>
            </form>
        </section>
    </div>
</div>";
?>
