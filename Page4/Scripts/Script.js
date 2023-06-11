const showAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');

  // показываем форму и оверлей
  formContainer.style.display = 'block';

  // запускаем анимацию
  formContainer.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });

  overlay.style.display = 'block';

  // обработчик клика на оверлее
  overlay.addEventListener('click', hideAddRecordForm);
}

const hideAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');

  // скрываем форму и оверлей
  formContainer.style.display = 'none';
  overlay.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const addRecordButton = document.querySelector('#add-record-button');
addRecordButton.addEventListener('click', showAddRecordForm);

//// forma 2

  function showChangeRecordForm(button) {
    sendButton = document.getElementById('change-form-send');
    sendButton.addEventListener('click', () => sendRequest(button.dataset.uid));
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');

  // показываем форму и оверлей
  formContainer2.style.display = 'block';

  // запускаем анимацию
  formContainer2.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });
  const parentElement = button.parentNode.parentNode;
  var table = parentElement.parentNode;
  const childElements = parentElement.querySelectorAll('.table-td');
  var tdData = [];


  childElements.forEach(td => {
    tdData.push(td.innerHTML);
  })

  var inputs = document.querySelectorAll('.column-value');
  var form = document.getElementById('change-record-form');
  var keys = form.querySelectorAll('.column-name');
  var tdKeys = [];
  keys.forEach(key => {
    tdKeys.push(key.innerHTML);
  })

  const result = tdKeys.reduce((acc, value, index) => {
    acc[value] = tdData[index];
    return acc;
  }, {});




  var i = 0;
  inputs.forEach(input => {
    input.setAttribute('value', tdData[i]);    
    i++;
  })
  overlay2.style.display = 'block';
  // обработчик клика на оверлее
  overlay2.addEventListener('click', hideChangeRecordForm);
}

function deleteRecord (button){
  deleteRequest(button.dataset.uid);
  const parentElement = button.parentNode.parentNode;
  var table = parentElement.parentNode;
  const childElements = parentElement.querySelectorAll('.table-td');
  var tdData = [];


  childElements.forEach(td => {
    tdData.push(td.innerHTML);
  })

  var inputs = document.querySelectorAll('.column-value');
  var form = document.getElementById('change-record-form');
  var keys = form.querySelectorAll('.column-name');
  var tdKeys = [];
  keys.forEach(key => {
    tdKeys.push(key.innerHTML);
  })

  const result = tdKeys.reduce((acc, value, index) => {
    acc[value] = tdData[index];
    return acc;
  }, {});




  var i = 0;
  inputs.forEach(input => {
    input.setAttribute('value', tdData[i]);    
    i++;
  })
}


function fillData(){
  var tdData = [];

  var form = document.getElementById('change-record-form');
  var inputs = form.querySelectorAll('.column-value');
  var keys = form.querySelectorAll('.column-name');
  var tdKeys = [];
  keys.forEach(key => {
    tdKeys.push(key.innerHTML);
  })
  inputs.forEach(td => {
    tdData.push(td.value);
  })

  
  const result = tdKeys.reduce((acc, value, index) => {
    acc[value] = tdData[index];
    return acc;
  }, {});
  return result;
}

const hideChangeRecordForm = () => {
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');

  // скрываем форму и оверлей
  formContainer2.style.display = 'none';
  overlay2.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay2.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const changeRecordButtons = document.querySelectorAll('.change-button');
changeRecordButtons.forEach(button => {
  button.addEventListener('click', function(){
    showChangeRecordForm(button);
  });
});
const deleteRecordButtons = document.querySelectorAll('.delite-button');
deleteRecordButtons.forEach(button => {
  button.addEventListener('click', function(){
    deleteRecord(button);
  });
});

/// 3


// const button = document.getElementById('change-record-button');
// button.addEventListener('click', sendRequest);

const changeRecordButtonsId = document.querySelectorAll('.change-form-send');
changeRecordButtonsId.forEach(button => {
  const parentElement = button.parentNode.parentNode;
  var table = parentElement.parentNode;
  const childElements = parentElement.querySelectorAll('.table-td');
  var tdData = [];


  childElements.forEach(td => {
    tdData.push(td.innerHTML);
  })

  

  //получить форму
  // получить инпуты этой формы
  // циклом пройтись по ним и заполнить инпуты


});

function sendRequest(uid) {
  data = {};
  data.data = fillData();
  data.supplierId = uid;
  console.log (data); 
  fetch('http://storage/Page4/Scripts/change_record.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(hideChangeRecordForm())
    .then(location.reload())
    .catch(error => {
      console.error(error);
      // здесь можно добавить обработку ошибок
    });
}
function deleteRequest(uid) {
  data = {};
  data.data = fillData();
  data.supplierId = uid;
  console.log (data); 
  fetch('http://storage/Page4/Scripts/delete_record.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then()
    .then(location.reload())
    .catch(error => {
      console.error(error);
      // здесь можно добавить обработку ошибок
    });
}
