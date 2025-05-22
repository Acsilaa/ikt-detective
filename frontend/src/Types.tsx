export type Person = {
    name: string,
    role: "subject"|"detective",
    attr: SubjectAttributes|DetectiveAttributes
}

export type SubjectAttributes = {
    job: string,
}
export type DetectiveAttributes = {
    job: string,
}

export type fresp = {
    success: boolean,
    data: Array<any>,
}