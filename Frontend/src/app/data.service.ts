import { Injectable } from '@angular/core';

@Injectable()
export class DataService {

  private courseList : object[] = [{
    "id_course":"1",
    "course_name":"Matematika",
    "teacher_name":"Ir. A. Rasyidin Fachry, M.Eng."
    },
  {
    "id_course":"2",
    "course_name":"Kimia",
    "teacher_name":"Dr. Ir. H. Maulid M. Iqbal, M.Sc."
  },
  {
    "id_course":"3",
    "course_name":"Fisika",
    "teacher_name":"Prof. Ir. Subriyer Nasir, M.S., Ph.D."
  },
  {
    "id_course":"4",
    "course_name":"IT",
    "teacher_name":"Ir. Hj. Ika Juliantina, M.S."
  },
  {
    "id_course":"5",
    "course_name":"Biologi",
    "teacher_name":"Dr.Ir. Dinar Dwi Anugerah Putranto, M.S.Pj."
  },

    ]

  constructor() { }
  getCourseList():object[]
  {
    return this.courseList;
  }

  addCourseList(obj:object):object[]
  {
    this.courseList.push(obj);
    return this.courseList;
  }

}
