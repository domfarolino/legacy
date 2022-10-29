import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'public-key',
  templateUrl: './public-key.component.html',
  styleUrls: ['../app.component.css', './public-key.component.css']
})
export class PublicKeyComponent implements OnInit {

  constructor() {}

  ngOnInit() {
  }

  downloadResume() {
    //https://drive.google.com/file/d/0B2HRo77RSb3FRGt5aEUwVzdHVWc/view?usp=sharing
    window.location.href = 'https://drive.google.com/uc?export=download&id=0B2HRo77RSb3FRGt5aEUwVzdHVWc';
  }

}
