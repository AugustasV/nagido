/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/build/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/js/scripts.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/js/scripts.js":
/*!******************************!*\
  !*** ./assets/js/scripts.js ***!
  \******************************/
/*! dynamic exports provided */
/*! all exports used */
/***/ (function(module, exports) {

windowSize();
showArticle(1);

function showArticle(articleID) {
    for (i = 1; i <= 12; i++) {
        if (i === articleID) {
            document.getElementById(i).style.display = 'block';
        } else {
            document.getElementById(i).style.display = 'none';
        }
    }
}

function windowSize() {
    var x1 = document.body.clientWidth;
    var x2;
    if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
        x2 = 250;
    } else {
        x2 = 0;
    }
    var x3 = x1 - x2 + 'px';
    document.getElementById('main').style.width = x3;
}

function openNav() {
    var x1 = document.body.clientWidth;
    var x2;
    if (document.getElementById('sideNavigation').style.width === '250px' || document.getElementById('sideNavigation').style.width === '') {
        document.getElementById('sideNavigation').style.width = '0px';
        document.getElementById('main').style.marginLeft = '0px';
        x2 = 0;
    } else {
        document.getElementById('sideNavigation').style.width = '250px';
        document.getElementById('main').style.marginLeft = '250px';
        x2 = 250;
    }
    var x3 = x1 - x2 + 'px';
    document.getElementById('main').style.width = x3;
}

function addDocument() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}

function display() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'block';
}

function goBack() {
    var x = document.getElementById('newDocumentWindow');
    x.style.display = 'none';
}

// function showMore() {
//     var x = document.getElementById('options');
//     x.style.display = 'block';
//     document.getElementById('newDocumentWindow').style.height = "700px";
//     document.getElementById('newDocumentWindow').style.width = "500px";
// }

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgYzEwZTA5MWVhMjQzMWU1MWY0OTIiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL3NjcmlwdHMuanMiXSwibmFtZXMiOlsid2luZG93U2l6ZSIsInNob3dBcnRpY2xlIiwiYXJ0aWNsZUlEIiwiaSIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJzdHlsZSIsImRpc3BsYXkiLCJ4MSIsImJvZHkiLCJjbGllbnRXaWR0aCIsIngyIiwid2lkdGgiLCJ4MyIsIm9wZW5OYXYiLCJtYXJnaW5MZWZ0IiwiYWRkRG9jdW1lbnQiLCJ4IiwiZ29CYWNrIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG1DQUEyQiwwQkFBMEIsRUFBRTtBQUN2RCx5Q0FBaUMsZUFBZTtBQUNoRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4REFBc0QsK0RBQStEOztBQUVySDtBQUNBOztBQUVBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7QUM3REFBO0FBQ0FDLFlBQVksQ0FBWjs7QUFFQSxTQUFTQSxXQUFULENBQXFCQyxTQUFyQixFQUFnQztBQUM1QixTQUFJQyxJQUFJLENBQVIsRUFBV0EsS0FBSyxFQUFoQixFQUFvQkEsR0FBcEIsRUFBeUI7QUFDckIsWUFBR0EsTUFBTUQsU0FBVCxFQUFvQjtBQUNoQkUscUJBQVNDLGNBQVQsQ0FBd0JGLENBQXhCLEVBQTJCRyxLQUEzQixDQUFpQ0MsT0FBakMsR0FBMkMsT0FBM0M7QUFDSCxTQUZELE1BR0s7QUFDREgscUJBQVNDLGNBQVQsQ0FBd0JGLENBQXhCLEVBQTJCRyxLQUEzQixDQUFpQ0MsT0FBakMsR0FBMkMsTUFBM0M7QUFDSDtBQUNKO0FBQ0o7O0FBRUQsU0FBU1AsVUFBVCxHQUFzQjtBQUNsQixRQUFJUSxLQUFLSixTQUFTSyxJQUFULENBQWNDLFdBQXZCO0FBQ0EsUUFBSUMsRUFBSjtBQUNBLFFBQUlQLFNBQVNDLGNBQVQsQ0FBd0IsZ0JBQXhCLEVBQTBDQyxLQUExQyxDQUFnRE0sS0FBaEQsS0FBMEQsT0FBMUQsSUFBcUVSLFNBQVNDLGNBQVQsQ0FBd0IsZ0JBQXhCLEVBQTBDQyxLQUExQyxDQUFnRE0sS0FBaEQsS0FBMEQsRUFBbkksRUFBdUk7QUFDbklELGFBQUssR0FBTDtBQUNILEtBRkQsTUFHSztBQUNEQSxhQUFLLENBQUw7QUFDSDtBQUNELFFBQUlFLEtBQU1MLEtBQUdHLEVBQUosR0FBUSxJQUFqQjtBQUNBUCxhQUFTQyxjQUFULENBQXdCLE1BQXhCLEVBQWdDQyxLQUFoQyxDQUFzQ00sS0FBdEMsR0FBOENDLEVBQTlDO0FBQ0g7O0FBRUQsU0FBU0MsT0FBVCxHQUFtQjtBQUNmLFFBQUlOLEtBQUtKLFNBQVNLLElBQVQsQ0FBY0MsV0FBdkI7QUFDQSxRQUFJQyxFQUFKO0FBQ0EsUUFBSVAsU0FBU0MsY0FBVCxDQUF3QixnQkFBeEIsRUFBMENDLEtBQTFDLENBQWdETSxLQUFoRCxLQUEwRCxPQUExRCxJQUFxRVIsU0FBU0MsY0FBVCxDQUF3QixnQkFBeEIsRUFBMENDLEtBQTFDLENBQWdETSxLQUFoRCxLQUEwRCxFQUFuSSxFQUF1STtBQUNuSVIsaUJBQVNDLGNBQVQsQ0FBd0IsZ0JBQXhCLEVBQTBDQyxLQUExQyxDQUFnRE0sS0FBaEQsR0FBd0QsS0FBeEQ7QUFDQVIsaUJBQVNDLGNBQVQsQ0FBd0IsTUFBeEIsRUFBZ0NDLEtBQWhDLENBQXNDUyxVQUF0QyxHQUFtRCxLQUFuRDtBQUNBSixhQUFLLENBQUw7QUFDSCxLQUpELE1BS0s7QUFDRFAsaUJBQVNDLGNBQVQsQ0FBd0IsZ0JBQXhCLEVBQTBDQyxLQUExQyxDQUFnRE0sS0FBaEQsR0FBd0QsT0FBeEQ7QUFDQVIsaUJBQVNDLGNBQVQsQ0FBd0IsTUFBeEIsRUFBZ0NDLEtBQWhDLENBQXNDUyxVQUF0QyxHQUFtRCxPQUFuRDtBQUNBSixhQUFLLEdBQUw7QUFDSDtBQUNELFFBQUlFLEtBQU1MLEtBQUdHLEVBQUosR0FBUSxJQUFqQjtBQUNBUCxhQUFTQyxjQUFULENBQXdCLE1BQXhCLEVBQWdDQyxLQUFoQyxDQUFzQ00sS0FBdEMsR0FBOENDLEVBQTlDO0FBQ0g7O0FBRUQsU0FBU0csV0FBVCxHQUF1QjtBQUNuQixRQUFJQyxJQUFJYixTQUFTQyxjQUFULENBQXdCLG1CQUF4QixDQUFSO0FBQ0FZLE1BQUVYLEtBQUYsQ0FBUUMsT0FBUixHQUFrQixPQUFsQjtBQUNIOztBQUVELFNBQVNBLE9BQVQsR0FBbUI7QUFDZixRQUFJVSxJQUFJYixTQUFTQyxjQUFULENBQXdCLG1CQUF4QixDQUFSO0FBQ0FZLE1BQUVYLEtBQUYsQ0FBUUMsT0FBUixHQUFrQixPQUFsQjtBQUNIOztBQUVELFNBQVNXLE1BQVQsR0FBa0I7QUFDZCxRQUFJRCxJQUFJYixTQUFTQyxjQUFULENBQXdCLG1CQUF4QixDQUFSO0FBQ0FZLE1BQUVYLEtBQUYsQ0FBUUMsT0FBUixHQUFrQixNQUFsQjtBQUNIOztBQUVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJIiwiZmlsZSI6ImpzL3NjcmlwdHMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCIvYnVpbGQvXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gXCIuL2Fzc2V0cy9qcy9zY3JpcHRzLmpzXCIpO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIGMxMGUwOTFlYTI0MzFlNTFmNDkyIiwid2luZG93U2l6ZSgpO1xuc2hvd0FydGljbGUoMSk7XG5cbmZ1bmN0aW9uIHNob3dBcnRpY2xlKGFydGljbGVJRCkge1xuICAgIGZvcihpID0gMTsgaSA8PSAxMjsgaSsrKSB7XG4gICAgICAgIGlmKGkgPT09IGFydGljbGVJRCkge1xuICAgICAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoaSkuc3R5bGUuZGlzcGxheSA9ICdibG9jayc7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpKS5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xuICAgICAgICB9XG4gICAgfVxufVxuXG5mdW5jdGlvbiB3aW5kb3dTaXplKCkge1xuICAgIHZhciB4MSA9IGRvY3VtZW50LmJvZHkuY2xpZW50V2lkdGg7XG4gICAgdmFyIHgyO1xuICAgIGlmIChkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2lkZU5hdmlnYXRpb24nKS5zdHlsZS53aWR0aCA9PT0gJzI1MHB4JyB8fCBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2lkZU5hdmlnYXRpb24nKS5zdHlsZS53aWR0aCA9PT0gJycpIHtcbiAgICAgICAgeDIgPSAyNTA7XG4gICAgfVxuICAgIGVsc2Uge1xuICAgICAgICB4MiA9IDA7XG4gICAgfVxuICAgIHZhciB4MyA9ICh4MS14MikrJ3B4JztcbiAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWFpbicpLnN0eWxlLndpZHRoID0geDM7XG59XG5cbmZ1bmN0aW9uIG9wZW5OYXYoKSB7XG4gICAgdmFyIHgxID0gZG9jdW1lbnQuYm9keS5jbGllbnRXaWR0aDtcbiAgICB2YXIgeDI7XG4gICAgaWYgKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzaWRlTmF2aWdhdGlvbicpLnN0eWxlLndpZHRoID09PSAnMjUwcHgnIHx8IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzaWRlTmF2aWdhdGlvbicpLnN0eWxlLndpZHRoID09PSAnJykge1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnc2lkZU5hdmlnYXRpb24nKS5zdHlsZS53aWR0aCA9ICcwcHgnO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWFpbicpLnN0eWxlLm1hcmdpbkxlZnQgPSAnMHB4JztcbiAgICAgICAgeDIgPSAwO1xuICAgIH1cbiAgICBlbHNlIHtcbiAgICAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3NpZGVOYXZpZ2F0aW9uJykuc3R5bGUud2lkdGggPSAnMjUwcHgnO1xuICAgICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWFpbicpLnN0eWxlLm1hcmdpbkxlZnQgPSAnMjUwcHgnO1xuICAgICAgICB4MiA9IDI1MDtcbiAgICB9XG4gICAgdmFyIHgzID0gKHgxLXgyKSsncHgnO1xuICAgIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtYWluJykuc3R5bGUud2lkdGggPSB4Mztcbn1cblxuZnVuY3Rpb24gYWRkRG9jdW1lbnQoKSB7XG4gICAgdmFyIHggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbmV3RG9jdW1lbnRXaW5kb3cnKTtcbiAgICB4LnN0eWxlLmRpc3BsYXkgPSAnYmxvY2snO1xufVxuXG5mdW5jdGlvbiBkaXNwbGF5KCkge1xuICAgIHZhciB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ25ld0RvY3VtZW50V2luZG93Jyk7XG4gICAgeC5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcbn1cblxuZnVuY3Rpb24gZ29CYWNrKCkge1xuICAgIHZhciB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ25ld0RvY3VtZW50V2luZG93Jyk7XG4gICAgeC5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xufVxuXG4vLyBmdW5jdGlvbiBzaG93TW9yZSgpIHtcbi8vICAgICB2YXIgeCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdvcHRpb25zJyk7XG4vLyAgICAgeC5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcbi8vICAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbmV3RG9jdW1lbnRXaW5kb3cnKS5zdHlsZS5oZWlnaHQgPSBcIjcwMHB4XCI7XG4vLyAgICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ25ld0RvY3VtZW50V2luZG93Jykuc3R5bGUud2lkdGggPSBcIjUwMHB4XCI7XG4vLyB9XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vYXNzZXRzL2pzL3NjcmlwdHMuanMiXSwic291cmNlUm9vdCI6IiJ9