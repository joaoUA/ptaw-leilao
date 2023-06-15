/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/verificationpage.js ***!
  \******************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) keys.push(key); return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
var userVerificationItems = document.getElementById('seller-vt') ? Array.from(document.getElementById('seller-vt').getElementsByClassName('vt-item')) : null;
var auctionVerificationItems = document.getElementById('auction-vt') ? Array.from(document.getElementById('auction-vt').getElementsByClassName('vt-item')) : null;
var btnConfirmRoleChangeRequest = document.getElementById('btn-user-modal-confirm-request');
var btnRejectRoleChangeRequest = document.getElementById('btn-user-modal-reject-request');
var btnConfirmAuctionVerification = document.getElementById('btn-auction-modal-confirm-request');
var btnRejectAuctionVerification = document.getElementById('btn-auction-modal-reject-request');
auctionVerificationItems === null || auctionVerificationItems === void 0 ? void 0 : auctionVerificationItems.shift();
userVerificationItems === null || userVerificationItems === void 0 ? void 0 : userVerificationItems.shift();
userVerificationItems === null || userVerificationItems === void 0 ? void 0 : userVerificationItems.forEach(function (element) {
  element.addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
    var requestId, response, roleChange, user, sellerName, sellerBirthday, sellerAddress, sellerEmail, sellerNif, sellerIban, modal;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          requestId = element.getAttribute('data-request-id');
          _context.prev = 1;
          _context.next = 4;
          return fetch("/api/role-request/".concat(requestId));
        case 4:
          response = _context.sent;
          _context.next = 7;
          return response.json();
        case 7:
          roleChange = _context.sent;
          _context.next = 10;
          return fetch("/api/user/".concat(roleChange.utilizador_id));
        case 10:
          response = _context.sent;
          _context.next = 13;
          return response.json();
        case 13:
          user = _context.sent;
          sellerName = document.getElementById('modal-seller-name');
          sellerBirthday = document.getElementById('modal-seller-birthday');
          sellerAddress = document.getElementById('modal-seller-address');
          sellerEmail = document.getElementById('modal-seller-email');
          sellerNif = document.getElementById('modal-seller-nif');
          sellerIban = document.getElementById('modal-seller-iban');
          sellerName.innerText = user['nome'];
          sellerBirthday.innerText = user['data_nascimento'].substring(0, 10);
          sellerAddress.innerText = user['morada'];
          sellerEmail.innerText = user['email'];
          sellerNif.innerText = user['nif'];
          sellerIban.innerText = user['iban'];
          modal = document.getElementById('modal-seller');
          modal.setAttribute('data-request-id', requestId);
          _context.next = 33;
          break;
        case 30:
          _context.prev = 30;
          _context.t0 = _context["catch"](1);
          console.error(_context.t0);
        case 33:
        case "end":
          return _context.stop();
      }
    }, _callee, null, [[1, 30]]);
  })));
});
auctionVerificationItems === null || auctionVerificationItems === void 0 ? void 0 : auctionVerificationItems.forEach(function (element) {
  element.addEventListener('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
    var auctionId, response, data, auction, modalBody, auctionTitle, auctionSeller;
    return _regeneratorRuntime().wrap(function _callee2$(_context2) {
      while (1) switch (_context2.prev = _context2.next) {
        case 0:
          auctionId = element.getAttribute('data-auction-id');
          _context2.prev = 1;
          _context2.next = 4;
          return fetch("api/auction/".concat(auctionId));
        case 4:
          response = _context2.sent;
          _context2.next = 7;
          return response.json();
        case 7:
          data = _context2.sent;
          auction = data['auction'];
          if (!(auction == null || Object.keys(auction).length === 0)) {
            _context2.next = 11;
            break;
          }
          throw Error("Leilão Vazio!");
        case 11:
          console.log(auction);
          modalBody = document.getElementById('modal-al');
          modalBody.setAttribute('data-auction-id', auction[0]['leilao_id']);
          auctionTitle = document.getElementById('modal-auction-name');
          auctionSeller = document.getElementById('modal-auction-seller');
          auctionTitle.innerText = auction[0]['descricao'];
          auctionSeller.innerText = auction[0]['vendedor_nome'];
          document.querySelectorAll('.modal-auction-item').forEach(function (element) {
            return element.remove();
          });
          Object.values(auction).forEach(function (auctionItem) {
            console.log(auctionItem);
            var modalAuctionItemDiv = document.createElement('div');
            modalAuctionItemDiv.classList.add('modal-auction-item');
            modalAuctionItemDiv.setAttribute('data-auction-item-id', auctionItem['peca_leilao_id']);
            var imageElement = document.createElement('img');
            imageElement.id = 'modal-article-image';
            imageElement.src = './img/img-placeholder-48.png';
            imageElement.alt = 'placeholder';
            imageElement.setAttribute('data-bs-toggle', 'modal');
            imageElement.setAttribute('data-bs-target', '#ModalArtigo');
            var paragraphElement = document.createElement('p');
            paragraphElement.innerText = auctionItem['peca_arte_nome'];
            var formCheckDiv = document.createElement('div');
            formCheckDiv.classList.add('form-check', 'form-switch');
            var inputElement = document.createElement('input');
            inputElement.type = 'checkbox';
            inputElement.classList.add('toggle-pill', 'form-check-input');
            inputElement.setAttribute('role', 'switch');
            imageElement.addEventListener('click', function () {
              var modalArticleName = document.getElementById('modal-auction-item-name');
              var modalArticleAuthor = document.getElementById('modal-auction-item-author');
              var modalArticleYear = document.getElementById('modal-auction-item-year');
              var modalArticleCategory = document.getElementById('modal-auction-item-category');
              var modalArticlePrice = document.getElementById('modal-auction-item-price');
              modalArticleName.innerText = "Nome: ".concat(auctionItem['peca_arte_nome']);
              modalArticleYear.innerText = "Data: ".concat(auctionItem['ano'] || 'N/A');
              modalArticleAuthor.innerText = "Artista: ".concat(auctionItem['artista'] || 'N/A');
              modalArticlePrice.innerText = "Pre\xE7o Inicial: ".concat(auctionItem['preco_inicial'], "\u20AC");
              modalArticleCategory.innerText = "Categoria: ".concat(auctionItem['categoria_nome']);
            });
            modalAuctionItemDiv.appendChild(imageElement);
            modalAuctionItemDiv.appendChild(paragraphElement);
            formCheckDiv.appendChild(inputElement);
            modalAuctionItemDiv.appendChild(formCheckDiv);
            var modalTitle = document.getElementById('modal-al-header');
            modalTitle.insertAdjacentElement('afterend', modalAuctionItemDiv);
          });
          _context2.next = 25;
          break;
        case 22:
          _context2.prev = 22;
          _context2.t0 = _context2["catch"](1);
          console.log(_context2.t0);
        case 25:
        case "end":
          return _context2.stop();
      }
    }, _callee2, null, [[1, 22]]);
  })));
});
btnConfirmRoleChangeRequest === null || btnConfirmRoleChangeRequest === void 0 ? void 0 : btnConfirmRoleChangeRequest.addEventListener('click', function () {
  var requestId = document.getElementById('modal-seller').getAttribute('data-request-id');
  fetch("/api/role-change/".concat(requestId), {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      decision: true
    })
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    } else throw new Error("Erro: ".concat(response.status));
  }).then(function (data) {
    return console.log(data);
  })["catch"](function (error) {
    return console.error(error);
  });
});
btnRejectRoleChangeRequest === null || btnRejectRoleChangeRequest === void 0 ? void 0 : btnRejectRoleChangeRequest.addEventListener('click', function () {
  var requestId = document.getElementById('modal-seller').getAttribute('data-request-id');
  fetch("/api/role-change/".concat(requestId), {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      decision: false
    })
  }).then(function (response) {
    if (response.ok) {
      return response.json();
    } else throw new Error("Erro: ".concat(response.status));
  }).then(function (data) {
    return console.log(data);
  })["catch"](function (error) {
    return console.error(error);
  });
});
btnConfirmAuctionVerification === null || btnConfirmAuctionVerification === void 0 ? void 0 : btnConfirmAuctionVerification.addEventListener('click', function () {
  var modalBody = document.getElementById('modal-al');
  var auctionId = modalBody.getAttribute('data-auction-id');
  updateAuctionAuthenticationStatus(auctionId, true);
});
btnRejectAuctionVerification === null || btnRejectAuctionVerification === void 0 ? void 0 : btnRejectAuctionVerification.addEventListener('click', function () {
  var modalBody = document.getElementById('modal-al');
  var auctionId = modalBody.getAttribute('data-auction-id');
  updateAuctionAuthenticationStatus(auctionId, false);
});
function updateAuctionAuthenticationStatus(_x, _x2) {
  return _updateAuctionAuthenticationStatus.apply(this, arguments);
}
function _updateAuctionAuthenticationStatus() {
  _updateAuctionAuthenticationStatus = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3(auctionId, status) {
    var responseMessage, responseAuthentication, data;
    return _regeneratorRuntime().wrap(function _callee3$(_context3) {
      while (1) switch (_context3.prev = _context3.next) {
        case 0:
          _context3.prev = 0;
          _context3.next = 3;
          return fetch("/api/auction/".concat(auctionId, "/authentication"), {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              status: status
            })
          });
        case 3:
          responseAuthentication = _context3.sent;
          _context3.next = 6;
          return responseAuthentication.json();
        case 6:
          data = _context3.sent;
          responseMessage = data['message'];
          if (responseAuthentication.ok) {
            _context3.next = 10;
            break;
          }
          throw new Error("".concat(responseAuthentication.status, ": ").concat(responseMessage));
        case 10:
          alert(responseMessage);

          //Publicar leilão se verificação foi aceite
          if (status) launchAuction(auctionId);
          location.reload();
          _context3.next = 18;
          break;
        case 15:
          _context3.prev = 15;
          _context3.t0 = _context3["catch"](0);
          console.log(responseMessage);
        case 18:
        case "end":
          return _context3.stop();
      }
    }, _callee3, null, [[0, 15]]);
  }));
  return _updateAuctionAuthenticationStatus.apply(this, arguments);
}
function launchAuction(_x3) {
  return _launchAuction.apply(this, arguments);
}
function _launchAuction() {
  _launchAuction = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4(auctionId) {
    var responseMessage, response, data;
    return _regeneratorRuntime().wrap(function _callee4$(_context4) {
      while (1) switch (_context4.prev = _context4.next) {
        case 0:
          _context4.prev = 0;
          _context4.next = 3;
          return fetch("/api/launch-auction/".concat(auctionId), {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
          });
        case 3:
          response = _context4.sent;
          _context4.next = 6;
          return response.json();
        case 6:
          data = _context4.sent;
          responseMessage = data['message'];
          if (response.ok) {
            _context4.next = 10;
            break;
          }
          throw new Error("".concat(response.status, ": ").concat(responseMessage));
        case 10:
          console.log(responseMessage);
          _context4.next = 16;
          break;
        case 13:
          _context4.prev = 13;
          _context4.t0 = _context4["catch"](0);
          console.log(responseMessage);
        case 16:
        case "end":
          return _context4.stop();
      }
    }, _callee4, null, [[0, 13]]);
  }));
  return _launchAuction.apply(this, arguments);
}
/******/ })()
;