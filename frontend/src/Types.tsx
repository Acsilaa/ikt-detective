export type Person = {
    name: string,
    role: "subject"|"detective",
    attr: SubjectAttributes|DetectiveAttributes,
    id: number,
}

export type SubjectAttributes = {
    job: string,
    actionCount: number,
}
export type DetectiveAttributes = {
    job: string,
    actionCount: number,
}

export type fresp = {
    success: boolean,
    data: Array<any>,
}