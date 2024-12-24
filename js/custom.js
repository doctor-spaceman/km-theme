document.addEventListener('DOMContentLoaded', () => {
  let $draggedItem = false;
  const $draggables = document.querySelectorAll('.social .js-drag-item');

  for (const $dragItem of $draggables) {
    $dragItem.addEventListener('dragstart', (e) => {
      $draggedItem = e.target;
      $draggedItem.classList.add('zoomOut');
      e.dataTransfer.effectAllowed = 'move';
    })
  }

  const $dragTargets = document.querySelectorAll('.js-drag-target');
  for (const $target of $dragTargets) {
    $target.addEventListener('dragover', (e) => {
      e.preventDefault();
    })
    $target.addEventListener('dragenter', (e) => {
      e.preventDefault();
    })
    $target.addEventListener('drop', (e) => {
      e.preventDefault();
      console.log(e.dataTransfer)
      
      $draggedItem.classList.remove('zoomOut');
      $draggedItem.classList.add('zoomIn');
      e.target.style.backgroundColor = 'transparent';
      e.target.appendChild($draggedItem);
      /*
      setTimeout(() => {
        window.location.href = $draggedItem.dataset.href;
      }, 1000);
      */
    })
  }
});