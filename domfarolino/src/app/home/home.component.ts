import { Component, OnInit, AfterViewInit, ElementRef } from '@angular/core';

@Component({
  selector: 'home-component',
  templateUrl: './home.component.html',
  styleUrls: ['../app.component.css', './home.component.css']
})

export class HomeComponent implements OnInit, AfterViewInit {
  repos: string[];
  constructor(private elementRef: ElementRef) {
    this.repos = [
      'domfarolino/angular2-login-seed',
      'domfarolino/algorithms',
      'domfarolino/push-notifications',
      'domfarolino/modular-javascript',
      'domfarolino/derbyhacks-hackathon',
      'domfarolino/blog',
      'domfarolino/directory-tree-print'
    ];
  }

  ngOnInit() {

  }

  ngAfterViewInit() {
    const s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "//cdn.jsdelivr.net/github-cards/latest/widget.js";
    this.elementRef.nativeElement.appendChild(s);
  }
}
