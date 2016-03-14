
<p class="info-note pb5">Indica un títular lo mas descriptivo y específico posible (120 carácteres máximo), en el contenido puedes desarrollarlo como desees.</p>
<div class="form-group">
    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="titulo" maxlength="120">
</div>
<div class="form-group">
    <textarea rows="5" name="content" id="content" placeholder="contenido" maxlength="20000">{{ old('content') }}</textarea>
</div>
